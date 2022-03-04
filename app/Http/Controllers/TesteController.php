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

    public function teste2(){

        $fornecedores = ['Fornecedor 1'];

        $fornecedores2 = [
            0 => [
                'nome' => 'Paulo',
                'status' => 'N',
                'cnpj' => '00.000.000/000-00', 
                'ddd' => '11', //SP
                'telefone' => '0000-0000'
            ],
            1 => [
                'nome' => 'Flavio',
                'status' => 'S', 
                'ddd' => '85', //CE
                'telefone' => '0000-0000'
            ],
            2 => [
                'nome' => 'Felipe',
                'status' => 'S', 
                'ddd' => '32', //MG
                'telefone' => '0000-0000'
            ]    
        ];
        
        /*
        Operador condicional ternario 
        condicao ? se verdade : se false;
        condicao ? se verdade : (condicao ? se verdade : se false);
        */
        $msg =  isset($fornecedores2[1]['cnpj']) ? 'CNPJ informado' : 'CNPJ não informado';
        echo $msg;
        $fornecedoresx = [];
        return view('app.fornecedor.teste', compact('fornecedores', 'fornecedores2', 'fornecedoresx'));
    }
}
