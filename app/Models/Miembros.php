<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Miembros extends Model
{
    use HasFactory;

     protected $table = 'miembros';

    protected $fillable = [
        'nombre',
        'correo',
    ];
}
