<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objeto extends Model
{
    use HasFactory;

    protected $fillable =[
        'objeto',
        'descripcion',
        'Modificado_Por',
        'Creado_Por'
    ];
}
