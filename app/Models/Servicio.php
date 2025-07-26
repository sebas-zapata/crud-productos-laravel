<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Servicio extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
    ];
}
