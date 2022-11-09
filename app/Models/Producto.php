<?php

namespace App\Models;

use App\Models\Proveedor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Producto extends Model
{
    protected $fillable = [
        'nombre',
        'imp',
        'codigo',
        'cant',
        'imagen',
        'proveedor_id',
        'precio_individual'
    ];
    use HasFactory;

    public function proveedor(){
        return $this->belongsTo(Proveedor::class);
    }
}
