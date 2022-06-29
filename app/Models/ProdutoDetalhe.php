<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoDetalhe extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = [
        'produto_id',
        'comprimento',
        'largura',
        'altura',
        'unidade_id'
    ];

    public function produto(){
        return $this->belongsTo('App\Models\Produto');
        # produtoDetalhe (fk) para produto (pk) -> 1 para 1 inverso
    }
}
