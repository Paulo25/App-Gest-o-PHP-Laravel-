@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')

 {{-- <br/><br/><br/><br/>FORNECEDOR --}}

    <div class="titulo-pagina-2">
        <p>Fornecedor - Adicionar</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{route('app.fornecedor.adicionar')}}">Novo</a></li>
            <li><a href="{{route('app.fornecedor')}}">Consulta</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style="width:30%; margin-left:auto; margin-right:auto;">
            <form method="post" action="">
                <input type="text" name="nome" placeholder="Nome" class="bolda-preta"/>
                <input type="text" name="site" placeholder="Site" class="bolda-preta"/>
                <input type="text" name="uf" placeholder="UF" class="bolda-preta"/>
                <input type="text" name="email" placeholder="E-mail" class="bolda-preta"/>
                <button type="submit" class="borda-preta">Cadastrar</button>
            </form>
        </div>
    </div>

@endsection