<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Models\Item;
use App\Models\Produto;
use App\Models\Unidade;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request = $request->all();

        $produtos = Item::select('produtos.*', 'unidades.descricao as un_descricao')
        ->join('unidades', 'unidades.id', 'produtos.unidade_id')->with(['itemDetalhe', 'fornecedor'])
        ->paginate(10);

        // $produtos = Produto::select('produtos.*', 'unidades.descricao as un_descricao')
        // ->join('unidades', 'unidades.id', 'produtos.unidade_id')
        // ->paginate(10);

        /*foreach($produtos as $key => $produto){
            //print_r($produto->getAttributes());
            $produtoDetalhe = ProdutoDetalhe::where('produto_id', $produto->id)->first();
            if(isset($produtoDetalhe)){
                $produtos[$key]['comprimento'] = $produtoDetalhe->comprimento;
                $produtos[$key]['largura'] = $produtoDetalhe->largura;
                $produtos[$key]['altura'] = $produtoDetalhe->altura; 
            }
        }*/

        return response()->view('app.produto.index', compact('produtos', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fornecedores = Fornecedor::all();
        $unidades = Unidade::all();
        return response()->view('app.produto.create', compact('unidades', 'fornecedores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id',
            'fornecedor_id' => 'exists:fornecedores,id'
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
            'descricao.min' => 'O campo descrição deve ter no mínimo 3 caracteres',
            'descricao.max' => 'O campo descrição deve ter no máximo 2000 caracteres',
            'peso.integer' => 'O campo peso deve ser um número inteiro',
            'unidade_id.exists' => 'A undiade de medida informada não existe',
            'fornecedor_id.exists' => 'Fornecedor informado não existe'
        ];

        $request->validate($regras, $feedback);
        Item::create($request->all());

        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        return response()->view('app.produto.show', compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $produto)
    {
        $fornecedores = Fornecedor::all();
        $unidades = Unidade::all();
        return response()->view('app.produto.edit', compact('produto', 'unidades', 'fornecedores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $produto)
    {
        $regras = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id',
            'fornecedor_id' => 'exists:fornecedores,id'
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
            'descricao.min' => 'O campo descrição deve ter no mínimo 3 caracteres',
            'descricao.max' => 'O campo descrição deve ter no máximo 2000 caracteres',
            'peso.integer' => 'O campo peso deve ser um número inteiro',
            'unidade_id.exists' => 'A undiade de medida informada não existe',
            'fornecedor_id.exists' => 'Fornecedor informado não existe'
        ];

        $request->validate($regras, $feedback);

        $produto->update($request->all()); //atualizando a instância do objeto com os dados recuperados na requisição http
        return redirect()->route('produto.show', ['produto' => $produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produto.index');
    }
}
