@extends('app.layouts.basico')

@section('titulo', 'Pedido')

@section('conteudo')

 {{-- <br/><br/><br/><br/>FORNECEDOR --}}

    <div class="titulo-pagina-2">
        <p>Pedido - Listar</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{route('pedido.create')}}">Novo</a></li>
            <li><a href="#">Consulta</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">

        <div style="width:90%; margin-left:auto; margin-right:auto;">
           <table border="1" width="100%">
                <thead>
                    <tr>
                        <th>ID do pedido</th>
                        <th>Cliente</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbory>
                    @foreach ($pedidos as $pedido)
                        <tr>
                            <td>{{$pedido->id}}</td>
                            <td>{{$pedido->cliente->nome}}</td>
                            <td><a href="{{route('pedido-produto.create', ['pedido' => $pedido->id])}}">Adicionar Produtos</a></td>
                            <td><a href="{{route('pedido.show', ['pedido' => $pedido->id])}}">Visualizar</a></td>
                            <td><a href="{{route('pedido.edit', ['pedido' => $pedido->id])}}">Editar</a></td>
                            <td>
                                <form id="form_{{$pedido->id}}" method="post" action="{{route('pedido.destroy', ['pedido' => $pedido->id])}}"> 
                                    @csrf
                                    @method('DELETE')
                                    <a href="#" onclick="document.getElementById('form_{{$pedido->id}}').submit()">Excluir</a>
                                    {{-- <button type="submit">Excluir</button> --}}
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbory>
           </table>

           {{ $pedidos->appends($request)->links() }}
           
           <!--
           <br/>
           {{ $pedidos->count() }} -- Total de registro por paginas
           <br/>
           {{ $pedidos->total() }} -- Total de registro da consulta
           <br/>
           {{ $pedidos->firstItem() }} -- Número do primeiro registro da página
           <br/>
           {{ $pedidos->lastItem() }} -- Número do último registro da página
           -->

           <br/>
           Exibindo {{$pedidos->count()}} pedidos de {{$pedidos->total()}} (de {{$pedidos->firstItem()}} a {{$pedidos->lastItem()}})
        </div>
    </div>

@endsection