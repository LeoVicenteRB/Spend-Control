<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Extra extends Model
{
protected $table = 'extra';
protected $fillable = [
        'origem','data', 'total','id_usuario'
    ];
}
