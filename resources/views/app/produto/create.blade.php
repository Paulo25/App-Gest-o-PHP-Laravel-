@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')

 {{-- <br/><br/><br/><br/>FORNECEDOR --}}

    <div class="titulo-pagina-2">
        <p>Produto - Adicionar</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{route('produto.index')}}">Voltar</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style="width:30%; margin-left:auto; margin-right:auto;">

            <form method="post" action="{{route('produto.store')}}">
                @csrf
                <input type="text" name="nome" placeholder="Nome" value="{{old('nome')}}" class="borda-preta"/>
                <span class="cor-msg-erro"> {{$errors->has('nome') ? $errors->first('nome') : ''}} </span>

                <input type="text" name="descricao" placeholder="Descrição" value="{{old('descricao')}}" class="borda-preta"/>
                <span class="cor-msg-erro"> {{$errors->has('descricao') ? $errors->first('descricao') : ''}} </span>

                <input type="text" name="peso" placeholder="Peso" value="{{old('peso')}}" class="borda-preta"/>
                <span class="cor-msg-erro"> {{$errors->has('peso') ? $errors->first('peso') : ''}} </span>

                <select name="unidade_id">
                    <option>-- Selecione a Unidade de Medida --</option>
                        @foreach ($unidades as $unidade)
                            <option value="{{$unidade->id}}" {{old('unidade_id') == $unidade->id ? 'selected' : ''}} >{{$unidade->descricao}}</option>
                        @endforeach
                </select>
                <span class="cor-msg-erro"> {{$errors->has('unidade_id') ? $errors->first('unidade_id') : ''}} </span>

                <button type="submit" class="borda-preta">Cadastrar</button>
            </form>
        </div>
    </div>

@endsection