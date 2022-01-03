<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
use App\Models\MotivoContato;

class ContatoController extends Controller
{

    public function contato(){

        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['titulo' => 'Contato', 'motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request){
        // echo '<pre>';
        // print_r($request->all());
        // echo '</pre>';
        // echo $request->input('nome');
        // echo 'Contato';
        // var_dump($_GET); // super global get
        //var_dump($_POST); // super global post

        // $contato = new SiteContato();
        // $contato->nome = $request->input('nome');
        // $contato->telefone = $request->input('telefone');
        // $contato->email = $request->input('email');
        // $contato->motivo_contato = $request->input('motivo_contato');
        // $contato->mensagem = $request->input('mensagem');
        // print_r($contato->getAttributes());
        //$contato->save();

        // $contato = new SiteContato();
        // $contato->fill($request->all());
        // $contato->save();

        $regras = [
            'nome' => 'required|min:3|max:40|unique:site_contatos', //nomes com no minimo 3, no max 40 caracteres e campo unico
            'telefone' => 'required',
            'email' => 'email|unique:site_contatos',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ];

        $feedback =  [
            'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome precisa ter no máximo 40 caracteres',
            'mensagem.max' => 'O campo mensagem precisa ter no máximo 2000 caracteres',
            'motivo_contatos_id.required' => 'O campo motivo contato é de preenchimento obrigatório',
            
            'unique' => 'O :attribute informado já está em uso',
            'required' => 'O campo :attribute é de preenchimento obrigatório',
            'email' => 'O email informado não é válido',
        ];

        $request->validate($regras, $feedback);

        SiteContato::create($request->all());

        return redirect()->route('site.index');

       // return view('site.contato', ['titulo' => 'Contato']);
    }
}
