<?php

namespace App\Http\Livewire;

use App\Models\Proveedor;
use Livewire\Component;

class CrearProveedor extends Component
{
    public $nombre_empresa;
    public $nombre_vendedor;
    public $codigo_ruta;


    protected $rules = [
        'nombre_empresa' => "required",
        'nombre_vendedor' => "required",
        'codigo_ruta' => "required"
    ];


    public function submit()
    {
        $datos = $this->validate();

        Proveedor::create([
            'nombre_empresa' => $datos['nombre_empresa'],
            'nombre_vendedor' => $datos['nombre_vendedor'],
            'codigo_ruta' => $datos['codigo_ruta'],

        ]);

        //crear un mensaje
        session()->flash('message', 'Proveedor agregado correctamente.');
    
        //redireccionar
        return redirect()->route('proveedores.index');
    }


    public function render()
    {
        return view('livewire.crear-proveedor');
    }
}
