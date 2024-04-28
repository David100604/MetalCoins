<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Item;
use App\Http\Requests\StoreProdutoRequest;
use App\Http\Requests\UpdateProdutoRequest;
use Illuminate\Http\Request;


class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $itens = \App\Models\Item::all();

        $dados = [];

        foreach ($itens as $item) {

           $dados[] = \App\Models\Item::where('item_id', $item->item_id)->first();
        }
         
        return view('produtos.produtos',['itens' => $dados] );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Produto $produto)
    {
        return view('produtos.form-incluir-produto', ['produto' => $produto]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $item = new \App\Models\Item;
        $item->nome = $request->nome;
        $item->descricao = $request->descricao;
        $item->valor = $request->valor;
        $item->tipo_item = 'Produto'; 

        // Upload da imagem
        if($request->hasFile('imagem') && $request->file('imagem')->isValid()){
            $requestImage = $request->imagem;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName()) . strtotime("now") . "." . $extension;

            $request->imagem->move(public_path('images/produtos'), $imageName);

            $item->imagem = $imageName;
        } 
        $item->save();

        $produto = new \App\Models\Produto;
        $produto->estoque = $request->estoque; 
        $produto->itens()->associate($item);
        $produto->item_id = $item->item_id;
        $produto->save();


        return Redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        
        $produto = \App\Models\Item::where('item_id', $request->item_id)->first()->produtos;
        $item = \App\Models\Item::where('item_id', $request->item_id)->first();

        return view('produtos.form-editar-produto', ['produto' => $produto], ['item' => $item]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {
        $item = Item::find($request->item_id);
        $item->nome = $request->nome;
        $item->descricao = $request->descricao;
        $item->valor = $request->valor;
        
        $produto = Item::find($request->item_id)->produtos;
        $produto->estoque = $request->estoque;

        $produto->save();
        $item->save();
        
        return Redirect()->route('produto.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $item_id)
    {
        $item = \App\Models\Item::find($item_id);
        $produto = \App\Models\Item::where('item_id', $item->item_id)->first()->produtos;

        $produto->delete();
        $item->delete();
            
        return Redirect()->route('produto.index');
    }
    

    public function search(Request $request)
    {
    if(empty($request->search)) {
        echo("Favor preencher todos os campos");
    }
    else 
    {
        $pesquisa = $request->input('search');
        $resultados = Item::where('nome', 'like', "%$pesquisa%")->get();
    
        return view('produtos.produtos-filtro', ['resultados' => $resultados]);
    }

    }
}