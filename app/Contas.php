<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contas extends Model
{
    protected $fillable = [
        'local', 'tipo', 'data', 'preco','id_usuario','conta_mensal'
    ];
}
