<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];

    public function pedidos(){
        return $this->hasMany('App\Models\Cliente', 'cliente_id', 'id');
        //o cliente tem muitos pedidos
    }
}
