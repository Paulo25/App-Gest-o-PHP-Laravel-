<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MotivoContato;

class PrincipalController extends Controller
{
    public function principal(){
        // echo 'Olá, seja bem vindo ao curso!';

        $motivo_contatos = MotivoContato::all();

        return view('site.principal', compact('motivo_contatos'));
    }

}
