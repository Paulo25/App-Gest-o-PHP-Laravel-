@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')

 {{-- <br/><br/><br/><br/>FORNECEDOR --}}

    <div class="titulo-pagina-2">
        <p>Cliente - Listar</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{route('cliente.create')}}">Novo</a></li>
            <li><a href="#">Consulta</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">

        <div style="width:90%; margin-left:auto; margin-right:auto;">
           <table border="1" width="100%">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbory>
                    @foreach ($clientes as $cliente)
                        <tr>
                            <td>{{$cliente->nome}}</td>
                            <td><a href="{{route('cliente.show', ['cliente' => $cliente->id])}}">Visualizar</a></td>
                            <td><a href="{{route('cliente.edit', ['cliente' => $cliente->id])}}">Editar</a></td>
                            <td>
                                <form id="form_{{$cliente->id}}" method="post" action="{{route('cliente.destroy', ['cliente' => $cliente->id])}}"> 
                                    @csrf
                                    @method('DELETE')
                                    <a href="#" onclick="document.getElementById('form_{{$cliente->id}}').submit()">Excluir</a>
                                    {{-- <button type="submit">Excluir</button> --}}
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbory>
           </table>

           {{ $clientes->appends($request)->links() }}
           
           <!--
           <br/>
           {{ $clientes->count() }} -- Total de registro por paginas
           <br/>
           {{ $clientes->total() }} -- Total de registro da consulta
           <br/>
           {{ $clientes->firstItem() }} -- Número do primeiro registro da página
           <br/>
           {{ $clientes->lastItem() }} -- Número do último registro da página
           -->

           <br/>
           Exibindo {{$clientes->count()}} clientes de {{$clientes->total()}} (de {{$clientes->firstItem()}} a {{$clientes->lastItem()}})
        </div>
    </div>

@endsection