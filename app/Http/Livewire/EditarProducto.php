<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use App\Models\Proveedor;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditarProducto extends Component
{
    use WithFileUploads;
    public $producto_id;
    public $nombre_producto;
    public $proveedor;
    public $codigo;
    public $cantidad;
    public $imp;
    public $precio_individual;
    public $imagen;
    public $imagen_nueva;

    protected $rules = [
        'nombre_producto' => 'required',
        'proveedor' => 'required|numeric',
        'codigo' => 'required',
        'cantidad' => 'required|numeric|min:1',
        'imp' => 'required',
        'precio_individual' => 'required',
        'imagen_nueva' => 'nullable|image|max:1024',
    ];

    public function mount(Producto $producto)
    {
        $this->producto_id = $producto->id;
        $this->nombre_producto = $producto->nombre;
        $this->proveedor = $producto->proveedor_id;
        $this->codigo = $producto->codigo;
        $this->cantidad = $producto->cant;
        
        $this->imp = $producto->imp;
        $this->precio_individual = $producto->precio_individual;
        $this->imagen = $producto->imagen;
    }

    public function editarProducto()
    {
        $datos = $this->validate();

        if ($this->imagen_nueva) {
            $imagen = $this->imagen_nueva->store('public/productos');
            $datos['imagen'] = str_replace('public/productos/', '', $imagen);
        }

        $producto = Producto::find($this->producto_id);

        $producto->nombre = $datos['nombre_producto'];
        $producto->proveedor_id = $datos['proveedor'];
        $producto->codigo = $datos['codigo'];
        $producto->cant = $datos['cantidad'];
        $producto->imp = $datos['imp'];
        $producto->precio_individual = $datos['precio_individual'];
        $producto->imagen = $datos['imagen'] ?? $producto->imagen; 
        $producto->save();

        //crear un mensaje
        session()->flash('message', 'Producto actualizado correctamente.');

        //redireccionar
        return redirect()->route('productos.index');
    }



    public function render()
    {
        $proveedores = Proveedor::all();
        return view('livewire.editar-producto',[
            'proveedores' => $proveedores
        ]);
    }
}
