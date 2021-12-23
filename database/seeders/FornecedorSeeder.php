<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fornecedor;
use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //instanciando o objeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 100';
        $fornecedor->site = 'www.fornecedor100.com';
        $fornecedor->uf = 'SP';
        $fornecedor->email = 'fornecedor100@gmail.com';
        $fornecedor->save();

        //utulizando método estatico create (passando as propriedade por parametros que estão definidas como atributos no fillable do model fornecedor)
        Fornecedor::create([
            'nome' =>  'Fornecedor 200',
            'site' =>  'www.Fornecedor200.com',
            'uf' =>  'BA',
            'email' =>  'fornecedor200@gamil.com'
        ]);

        //insert via ORM query builder
        DB::table('fornecedores')->insert([
            'nome' =>  'Fornecedor 300',
            'site' =>  'www.Fornecedor300.com',
            'uf' =>  'BA',
            'email' =>  'fornecedor300@gamil.com'
        ]);

    }
}
