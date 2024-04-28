<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servico;
use App\Models\Item;
use App\Http\Requests\StoreServicoRequest;
use App\Http\Requests\UpdateServicoRequest;

class ServicoController extends Controller
{
    public function catalogo()
    {
        $itens = Item::with('servicos')->get();
        return view('catalogo.catalogo-servicos', ['itens' => $itens]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $servicos = \App\Models\Servico::all();
        $itens = \App\Models\Item::all();

        $dados = [];

        foreach ($itens as $item) {
           $dados[] = \App\Models\Item::where('item_id', $item->item_id)->first();
        }
         
        return view('servicos.servicos',['itens' => $dados]);
         
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
    
        return view('servicos.servicos-filtro', ['resultados' => $resultados]);
    }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('servicos.form-incluir-servico');
    }

    public function salvarImagem(Request $request)
    {
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $requestImage = $request->imagem;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName()) . '_' . strtotime("now") . "." . $extension;

            $request->imagem->move(public_path('images/servico'), $imageName);
            
            return $imageName;
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
        $item->tipo_item = 'Serviço'; 

    // Upload da imagem
                
        $item->imagem = $this->salvarImagem($request);
        $item->save();

        $servico = new \App\Models\Servico();
        $servico->provedor = $request->provedor; 
        $servico->itens()->associate($item);
        $servico->item_id = $item->item_id;
        $servico->save();


        return Redirect()->route('servicos.index');
        }

        /**
         * Display the specified resource.
         */
        public function show(Servico $servico)
        {
            //
        }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $servico = \App\Models\Item::where('item_id', $request->item_id)->first()->servicos;
        $item = \App\Models\Item::where('item_id', $request->item_id)->first();

        return view('servicos.form-editar-servico', ['servico' => $servico], ['item' => $item]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Servico $servico)
    {
        $i = Item::find($request->item_id);
        $i->nome = $request->nome;
        $i->descricao = $request->descricao;
        $i->valor = $request->valor;
        
        $s = Item::find($request->item_id)->servicos;
        $s->provedor = $request->provedor;

        $s->save();
        $i->save();
        
        return Redirect()->route('servicos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Int $item_id)
    {
        $item = \App\Models\Item::find($item_id);
        $servico = \App\Models\Item::where('item_id', $item->item_id)->first()->servicos;

        $servico->delete();
        $item->delete();
            
        return Redirect()->route('servicos.index');
    }
}