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
            <b class="">{{$msg ?? ''}}</b>

            <form method="post" action="{{route('app.fornecedor.adicionar')}}">
                @csrf
                <input type="hidden" name="id" value="{{$fornecedor->id ?? ''}}"/>

                <input type="text" name="nome" placeholder="Nome" value="{{$fornecedor->nome ?? old('nome')}}" class="borda-preta"/>
                <span class="cor-msg-erro">{{$errors->has('nome') ? $errors->first('nome') : ''}}</span>

                <input type="text" name="site" placeholder="Site" value="{{$fornecedor->site ?? old('site')}}" class="borda-preta"/>
                <span class="cor-msg-erro">{{$errors->has('site') ? $errors->first('site') : ''}}</span>

                <input type="text" name="uf" placeholder="UF" value="{{$fornecedor->uf ?? old('uf')}}" class="borda-preta"/>
                <span class="cor-msg-erro">{{$errors->has('uf') ? $errors->first('uf') : ''}}</span>

                <input type="text" name="email" placeholder="E-mail" value="{{$fornecedor->email ?? old('email')}}" class="borda-preta"/>
                <span class="cor-msg-erro">{{$errors->has('email') ? $errors->first('email') : ''}}</span>

                <button type="submit" class="borda-preta">Cadastrar</button>
            </form>
        </div>
    </div>

@endsection