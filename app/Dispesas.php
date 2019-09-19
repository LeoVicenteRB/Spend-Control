<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dispesas extends Model
{
 protected $fillable = [
        'local', 'tipo', 'datap', 'preco'
    ];
}
