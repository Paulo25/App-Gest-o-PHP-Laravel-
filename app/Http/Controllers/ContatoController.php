<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato(){
        // echo 'Contato';
        // var_dump($_GET); // super global get
        //var_dump($_POST); // super global post

        return view('site.contato', ['titulo' => 'Contato']);
    }
}
