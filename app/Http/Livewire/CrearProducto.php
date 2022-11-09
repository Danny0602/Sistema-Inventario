<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use App\Models\Proveedor;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearProducto extends Component
{
    use WithFileUploads;
    public $nombre_producto;
    public $proveedor;
    public $codigo;
    public $cantidad;
    public $imp;
    public $precio_individual;
    public $imagen;

    protected $rules = [
        'nombre_producto' => 'required',
        'proveedor' => 'required|numeric',
        'codigo' => 'required',
        'cantidad' => 'required|numeric|min:1',
        'imp' => 'required',
        'precio_individual' => 'required',
        'imagen' => 'required|image|max:1024',
    ];


    public function submit()
    {
        $datos = $this->validate();

        $imagen = $this->imagen->store('public/productos');
        $datos['imagen'] = str_replace('public/productos/', '',$imagen);

        Producto::create([
            'nombre' => $datos['nombre_producto'],
            'codigo' => $datos['codigo'],
            'proveedor_id' => $datos['proveedor'],
            'cant' => $datos['cantidad'],
            'imp' => $datos['imp'],
            'precio_individual' => $datos['precio_individual'],
            'imagen' => $datos['imagen'],
            
            
            ]);
    
    
            //crear un mensaje
            session()->flash('message', 'Producto agregado correctamente.');
    
            //redireccionar
            return redirect()->route('productos.index');
    }






    public function render()
    {
        $proveedores = Proveedor::all();
        return view('livewire.crear-producto',[
            'proveedores' => $proveedores
        ]);
    }
}
