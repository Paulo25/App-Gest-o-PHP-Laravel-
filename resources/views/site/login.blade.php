
@extends('site.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')
    <body>

        <div class="conteudo-pagina">
            <div class="titulo-pagina">
                <h1>Login</h1>
            </div>

            <div class="informacao-pagina">
             <div style=" width:30%; margin-left:auto; margin-right:auto ">
                <form action="{{route('site.login')}}" method="post" >
                    @csrf
                    <div>
                    <input name="usuario" type="text" value="{{old('usuario')}}" id="id_usuario" placeholder="Usuário" class="borda-preta"/>
                    <span class="cor-msg-erro">{{$errors->has('usuario') ? $errors->first('usuario') : ''}}</span>
                    </div>
                    <div>
                    <input name="senha" type="password" value="{{old('senha')}}" placeholder="Senha" class="borda-preta"/>
                    <span class="cor-msg-erro">{{$errors->has('senha') ? $errors->first('senha') : ''}}</span>
                    </div>
                    <button type="submit" class="borda-preta">Acessar</button>
                </form>
                {{isset($erro) && !empty($erro) ? $erro : ''}}
             </div>
            </div>  
        </div>

        <div class="rodape">
            <div class="redes-sociais">
                <h2>Redes sociais</h2>
                <img src="{{asset('img/facebook.png')}}">
                <img src="{{asset('img/linkedin.png')}}">
                <img src="{{asset('img/youtube.png')}}">
            </div>
            <div class="area-contato">
                <h2>Contato</h2>
                <span>(11) 3333-4444</span>
                <br>
                <span>supergestao@dominio.com.br</span>
            </div>
            <div class="localizacao">
                <h2>Localização</h2>
                <img src="{{asset('img/mapa.png')}}">
            </div>
        </div>
@endsection