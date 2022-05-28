@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')

 {{-- <br/><br/><br/><br/>FORNECEDOR --}}

    <div class="titulo-pagina-2">
        <p>Produto - Listar</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{route('produto.create')}}">Novo</a></li>
            <li><a href="{{route('app.fornecedor')}}">Consulta</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style="width:90%; margin-left:auto; margin-right:auto;">
           <table border="1" width="100%">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Peso</th>
                        <th>Unidade</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbory>
                    @foreach ($produtos as $produto)
                        <tr>
                            <td>{{$produto->nome}}</td>
                            <td>{{$produto->descricao}}</td>
                            <td>{{$produto->peso}}</td>
                            <td>{{$produto->un_descricao}}</td>
                            <td><a href="">Editar</a></td>
                            <td><a href="">Excluir</a></td>
                        </tr>
                    @endforeach
                </tbory>
           </table>

           {{ $produtos->appends($request)->links() }}
           
           <!--
           <br/>
           {{ $produtos->count() }} -- Total de registro por paginas
           <br/>
           {{ $produtos->total() }} -- Total de registro da consulta
           <br/>
           {{ $produtos->firstItem() }} -- Número do primeiro registro da página
           <br/>
           {{ $produtos->lastItem() }} -- Número do último registro da página
           -->

           <br/>
           Exibindo {{$produtos->count()}} produtos de {{$produtos->total()}} (de {{$produtos->firstItem()}} a {{$produtos->lastItem()}})
        </div>
    </div>

@endsection