<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Pedido;
use App\Models\PedidoProduto;
use App\Models\Produto;
use Illuminate\Http\Request;

class PedidoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * @param Pedido $pedido
     * @return \Illuminate\Http\Response
     */
    public function create(Pedido $pedido)
    {
        $produtos = Produto::all();
        return Response()->view('app.pedido_produto.create', compact('pedido', 'produtos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pedido $pedido)
    {
        $regras = [
            'produto_id' => 'exists:produtos,id',
            'quantidade' => 'required'
        ];
        $feedback = [
            'produto_id.exists' => 'O produto não existe',
            'required' => 'O campo :attribute é obrigatório'
        ];

        $request->validate($regras, $feedback);

        // $pedido_produto = new PedidoProduto();
        // $pedido_produto->pedido_id = $pedido->id;
        // $pedido_produto->quantidade = $request->get('quantidade');
        // $pedido_produto->produto_id = $request->get('produto_id');
        // $pedido_produto->save();

        // $pedido->produtos()->attach([ //passando varios produtos_id de uma vez
        //     [$request->get('produto_id'), 'quantidade' => $request->get('quantidade')]
        // ]);

        $pedido->produtos()->attach($request->get('produto_id'), ['quantidade' => $request->get('quantidade')]);

        return redirect()->route('pedido-produto.create', ['pedido' => $pedido->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  PedidoProduto $pedidoProduto
     * @param int $pedido_id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PedidoProduto $pedidoProduto, $pedido_id)
    {
        //approuch: conduta convencional
       /* PedidoProduto::where(
            [
                'pedido_id' => $pedido->id,
                'produto_id' => $produto->id
            ]
        )->delete();*/

        //$pedido->produtos()->detach($produto->id);

        $pedidoProduto->delete();

        return redirect()->route('pedido-produto.create', ['pedido' => $pedido_id]);
    }
}
