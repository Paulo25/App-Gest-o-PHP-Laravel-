<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//conversão que o laravel faz para identificar a tabela no banco de dados correspondente ao model
//Site_Contato -> site_contato -> site_contatos

class SiteContato extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome', 
        'telefone', 
        'email', 
        'motivo_contato',
        'mensagem'
    ];
}
