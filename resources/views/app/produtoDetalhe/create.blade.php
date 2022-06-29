@extends('app.layouts.basico')

@section('titulo', 'Detalhes do Produto')

@section('conteudo')

 {{-- <br/><br/><br/><br/>FORNECEDOR --}}

    <div class="titulo-pagina-2">
        <p>Produto Detalhe - Adicionar</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="#">Voltar</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style="width:30%; margin-left:auto; margin-right:auto;">
            @component('app.produtoDetalhe._components.form_create_edit', ['unidades' => $unidades, 'produtos' => $produtos])
            @endcomponent
        </div>
    </div>

@endsection