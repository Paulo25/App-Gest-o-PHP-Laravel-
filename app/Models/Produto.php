<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];

    public function produtoDetalhe(){
        return $this->hasOne('App\Models\ProdutoDetalhe');
        # 1 produto tem 1 produtoDetalhe
        # produto (id) = pk e produtoDetalhe (produto_id) = fk 
    }
}
