<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class autenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $metodo_autenticacao, $perfil, $param3, $param4)
    {
        //verifica se o usuário está autenticado
        /*
        if($metodo_autenticacao == 'padrao'){
            echo "Autenticacao $metodo_autenticacao, com perfil $perfil. Verificar o usuário e senha no banco de dados.". '</br>';
        }
        if($metodo_autenticacao == 'ldap'){
            echo "Autenticacao via $metodo_autenticacao, com perfil $perfil. Verificar o usuário e senha no AD (Active Directory).". '</br>';
        }
        if($perfil == 'visitante'){
            echo 'Exibir apenas alguns recursos.' . '</br>';
        }else{
            echo 'Carregar o perfil do banco de dados.' . '</br>';
        }
        if(false){
            return $next($request);
        }else{
            return Response('Acesso negado. Rota existe autenticação!!!');
        }
        */
        session_start();
        
        if(isset($_SESSION['email']) && isset($_SESSION['email']) != ''){
            return $next($request);
        }else{
            return redirect()->route('site.login', ['erro' => 2]);
        }
    }
}
