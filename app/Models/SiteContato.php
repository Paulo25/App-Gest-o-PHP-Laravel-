<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//conversão que o laravel faz para identificar um model no banco de dados
//Site_Contato -> site_contato -> site_contatos

class SiteContato extends Model
{
    use HasFactory;
}
