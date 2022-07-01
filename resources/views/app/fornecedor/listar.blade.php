@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')

    {{-- <br/><br/><br/><br/>FORNECEDOR --}}

    <div class="titulo-pagina-2">
        <p>Fornecedor - Listar</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
            <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style="width:90%; margin-left:auto; margin-right:auto;">
            <table border="1" width="100%">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Site</th>
                        <th>UF</th>
                        <th>E-mail</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbory>
                    @foreach ($fornecedores as $fornecedor)
                        <tr>
                            <td>{{ $fornecedor->nome }}</td>
                            <td>{{ $fornecedor->site }}</td>
                            <td>{{ $fornecedor->uf }}</td>
                            <td>{{ $fornecedor->email }}</td>
                            <td><a href="{{ route('app.fornecedor.editar', $fornecedor->id) }}">Editar</a></td>
                            <td><a href="{{ route('app.fornecedor.excluir', $fornecedor->id) }}">Excluir</a></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p>Lista de Produtos</p>
                                <table border="1" style="margin-bottom:15px;  width:100%;">
                                    <thead>
                                        <tr>
                                            <td>ID</td>
                                            <td>Nome</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($fornecedor->produtos as $key => $produto)
                                            <tr>
                                                <td>{{ $produto->id }}</td>
                                                <td>{{ $produto->nome }}</td>
                                            </tr>
                                        @endforeach
                                        @unless(count($fornecedor->produtos))
                                            <tr>
                                                <td colspan="2">Sem produto!</td>
                                            </tr>
                                        @endunless
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    @endforeach
                </tbory>
            </table>

            {{ $fornecedores->appends($request)->links() }}

            <!--
                   <br/>
                   {{ $fornecedores->count() }} -- Total de registro por paginas
                   <br/>
                   {{ $fornecedores->total() }} -- Total de registro da consulta
                   <br/>
                   {{ $fornecedores->firstItem() }} -- Número do primeiro registro da página
                   <br/>
                   {{ $fornecedores->lastItem() }} -- Número do último registro da página
                   -->

            <br />
            Exibindo {{ $fornecedores->count() }} fornecedores de {{ $fornecedores->total() }} (de
            {{ $fornecedores->firstItem() }} a {{ $fornecedores->lastItem() }})
        </div>
    </div>

@endsection
