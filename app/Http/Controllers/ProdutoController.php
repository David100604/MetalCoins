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

    //  public function ImagemSalvarProduto(Request $request)
    //  {
    //      // Validação dos dados do formulário (se necessário)
 
    //      // Salvar a imagem do produto
    //      if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
    //          $requestImage = $request->imagem;
    //          $extension = $requestImage->extension();
    //          $imageName = md5($requestImage->getClientOriginalName()) . '_' . strtotime("now") . "." . $extension;
    //          $requestImage->move(public_path('images/produtos'), $imageName);
    //      } else {
    //          $imageName = null; // Caso não seja enviada uma imagem
    //      }
 
    //      // Criar o novo item com os dados do formulário
    //      $item = new Item;
    //      $item->nome = $request->nome;
    //      $item->descricao = $request->descricao;
    //      $item->valor = $request->valor;
    //      $item->estoque = $request->estoque;
    //      $item->imagem = $imageName; // Salvar o caminho da imagem
    //      $item->save();
 
    //      // Redirecionar para a página de listagem de produtos
    //      return redirect()->route('produto.index');
    //  }

    public function catalogo(){
        $itens = Item::with('produtos')->get();
         
        return view('catalogo.catalogo-produtos', ['itens' => $itens]);

    }


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

    public function salvarImagem(Request $request)
    {
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $requestImage = $request->imagem;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName()) . '_' . strtotime("now") . "." . $extension;

            $request->imagem->move(public_path('images/produtos'), $imageName);
            
            return $imageName;
        } else {
            return null;
        }
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
        
        $item->imagem = $this->salvarImagem($request);
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

        $item->imagem = $this->salvarImagem($request);
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