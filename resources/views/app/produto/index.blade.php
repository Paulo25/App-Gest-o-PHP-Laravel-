@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')

 {{-- <br/><br/><br/><br/>FORNECEDOR --}}

    <div class="titulo-pagina-2">
        <p>Produto - Listar</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{route('produto.create')}}">Novo</a></li>
            <li><a href="{{route('produto.index')}}">Consulta</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">
        {{-- {{$produtos->toJson()}} --}}
        <div style="width:90%; margin-left:auto; margin-right:auto;">
           <table border="1" width="100%">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Peso</th>
                        <th>Unidade</th>
                        <th>Comprimento</th>
                        <th>Largura</th>
                        <th>Altura</th>
                        <th></th>
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
                            <td>{{$produto->itemDetalhe->comprimento ?? ''}}</td>
                            <td>{{$produto->itemDetalhe->largura ?? ''}}</td>
                            <td>{{$produto->itemDetalhe->altura ?? ''}}</td>
                            <td><a href="{{route('produto.show', ['produto' => $produto->id])}}">Visualizar</a></td>
                            <td><a href="{{route('produto.edit', ['produto' => $produto->id])}}">Editar</a></td>
                            <td>
                                <form id="form_{{$produto->id}}" method="post" action="{{route('produto.destroy', ['produto' => $produto->id])}}"> 
                                    @csrf
                                    @method('DELETE')
                                    <a href="#" onclick="document.getElementById('form_{{$produto->id}}').submit()">Excluir</a>
                                    {{-- <button type="submit">Excluir</button> --}}
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbory>
           </table>
{{-- {{$produtos->toJson()}} --}}
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