<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parametro extends Model
{
    use HasFactory;

    protected $fillable=[
        'parametro',
        'valor',
        'Modificado_Por',
        'Creado_Por'
    ];

}
