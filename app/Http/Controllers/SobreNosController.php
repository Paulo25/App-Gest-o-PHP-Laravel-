<?php

namespace App\Http\Controllers;

use App\Http\Middleware\LogAcessoMiddleware;
use Illuminate\Http\Request;

class SobreNosController extends Controller
{
    public function __construct(){
        // $this->middleware(LogAcessoMiddleware::class);
        $this->middleware('log.acesso'); //chamada de middleware por apelido
    }

    public function sobreNos(){
        // echo 'Sobre-nós';
        return view('site.sobre-nos');
    }
}
