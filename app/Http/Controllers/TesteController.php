<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function teste(int $num1, int $num2){
        // echo "A soma de $num1 + $num2 é: " . $num1 + $num2;

        // return view('site.teste', ['num1' => $num1, 'num2' => $num2,]); //array associativo 

        // return view('site.teste', compact('num1', 'num2')); //compact

        return view('site.teste')->with('num1', $num1)->with('num2', $num2); //with
    }
}
