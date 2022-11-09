<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $fillable = [
        'nombre_empresa',
        'nombre_vendedor',
        'codigo_ruta'
    ];
    use HasFactory;
}
