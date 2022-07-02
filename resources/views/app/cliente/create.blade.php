@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')

 {{-- <br/><br/><br/><br/>FORNECEDOR --}}

    <div class="titulo-pagina-2">
        <p>Cliente - Adicionar</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{route('cliente.index')}}">Voltar</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style="width:30%; margin-left:auto; margin-right:auto;">
            @component('app.cliente._components.form_create_edit')
            @endcomponent
        </div>
    </div>

@endsection