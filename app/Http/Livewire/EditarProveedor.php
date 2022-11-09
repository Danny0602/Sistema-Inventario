<?php

namespace App\Http\Livewire;

use App\Models\Proveedor;
use Livewire\Component;

class EditarProveedor extends Component
{
    public $proveedor_id;
    public $nombre_empresa;
    public $nombre_vendedor;
    public $codigo_ruta;


    protected $rules = [
        'nombre_empresa' => "required",
        'nombre_vendedor' => "required",
        'codigo_ruta' => "required"
    ];


    public function mount(Proveedor $proveedor)
    {
        $this->proveedor_id = $proveedor->id;
        $this->nombre_empresa = $proveedor->nombre_empresa;
        $this->nombre_vendedor = $proveedor->nombre_vendedor;
        $this->codigo_ruta = $proveedor->codigo_ruta;
        
    }


    public function editarProveedor(){
        $datos = $this->validate();
        
        $proveedor = Proveedor::find($this->proveedor_id);

        $proveedor->nombre_empresa = $datos['nombre_empresa'];
        $proveedor->nombre_vendedor = $datos['nombre_vendedor'];
        $proveedor->codigo_ruta = $datos['codigo_ruta'];
        
        $proveedor->save();

        //crear un mensaje
        session()->flash('message', 'Ṕroveedor actualizado correctamente.');

        //redireccionar
        return redirect()->route('proveedores.index');
    
    
    }








    public function render()
    {
        return view('livewire.editar-proveedor');
    }
}
