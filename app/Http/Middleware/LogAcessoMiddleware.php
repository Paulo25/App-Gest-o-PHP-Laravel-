<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use \App\Models\LogAcesso;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //manipula $request
        //manipula $response

        $ip = $request->server->get('REMOTE_ADDR'); //recupera o ip do servidor de dominio que fez a requisição
        $rota = $request->getRequestUri(); //recupera a rota em que a requisição está acessando
        LogAcesso::create(['log' => "Ip $ip requisitou a rota $rota"]);
        
        //return $next($request); //next da continuidade com a requisição
        
        $resposta = $next($request);

        $resposta->setStatusCode('201', 'status code e status texto foram moficados!!!');

        return $resposta;
        //return Response('chegamos no middleware e finalizamos no próprio middlware');
    }
}
