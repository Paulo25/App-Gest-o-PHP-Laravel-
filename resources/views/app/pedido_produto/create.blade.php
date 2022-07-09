@extends('app.layouts.basico')

@section('titulo', 'Pedido')

@section('conteudo')

    {{-- <br/><br/><br/><br/>FORNECEDOR --}}

    <div class="titulo-pagina-2">
        <p>Adicionar Produtos ao Pedido</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <h4>Detalhes do Pedido</h4>
        <p>ID do Pedido: {{ $pedido->id }}</p>
        <p>Cliente: {{ $pedido->cliente->nome }}</p>
        <div style="width:30%; margin-left:auto; margin-right:auto;">
            <h4>Itens do Produto</h4>
            <table border="1" width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Produto</th>
                        <th>data de inclusção do item do pedido</th>
                        <th>QTD</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pedido->produtos as $produto)
                        <tr>
                            <td>{{ $produto->id }}</td>
                            <td>{{ $produto->nome }}</td>
                            <td>{{ $produto->pivot->created_at->format('d/m/Y') }}</td>
                            <td>{{ $produto->pivot->quantidade }}</td>
                            <td>
                                <form id="form_{{ $produto->pivot->id }}" method="post"
                                    action="{{ route('pedido-produto.destroy', ['pedido_produto' => $produto->pivot->id , 'pedido_id' => $pedido->id])}}">
                                    @method('DELETE')
                                    @csrf
                                    <a href="javascript:(void)"
                                        onclick="document.getElementById('form_{{ $produto->pivot->id }}').submit()">Excluir</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @component('app.pedido_produto._components.form_create', ['pedido' => $pedido, 'produtos' => $produtos])
            @endcomponent
        </div>
    </div>

@endsection
