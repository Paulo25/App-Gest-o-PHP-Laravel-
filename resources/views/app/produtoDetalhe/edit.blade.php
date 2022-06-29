@extends('app.layouts.basico')

@section('titulo', 'Produto Detalhes')

@section('conteudo')

    <div class="titulo-pagina-2">
        <p>Produto Destalhes - Editar</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="#">Voltar</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <h4>Produto</h4>
        <div>Nome: {{$produtoDetalhe->produto->nome}}</div>
        <br/>
        <div>Descrição: {{$produtoDetalhe->produto->descricao}}</div>
        <br/>

        <div style="width:30%; margin-left:auto; margin-right:auto;">
            @component('app.produtoDetalhe._components.form_create_edit', ['produto_detalhe' => $produtoDetalhe, 'produtos' => $produtos,'unidades' => $unidades])
            @endcomponent
        </div>
    </div>

@endsection
