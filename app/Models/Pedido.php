<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = ['cliente_id'];

    public function cliente(){
        return $this->belongsTo('App\Models\Cliente', 'cliente_id', 'id');
        //o pedido pertence ao cliente
    }

    public function produtos(){
        // return $this->belongsToMany('App\Models\Produto', 'pedidos_produtos'); //utlizando a nomeclatura nativa do framework
        
        return $this->belongsToMany('App\Models\Produto', 'pedidos_produtos', 'pedido_id', 'produto_id')->withPivot('id', 'created_at', 'updated_at', 'quantidade');
        /*
            1 - Modelo do relacionamento N x N em relação ao modelo implementado
            2 - É a tabela auxiliar que armazena os registros de relacionamento
            3 - Representa o nome da FK da tabela mapeada pelo modelo na tabela de relacionamento
            4 - Representa o nome da FK da tabela mapeada pelo model utilizado no relacionamento
         */
    }
}
