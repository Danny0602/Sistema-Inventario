<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use Livewire\Component;

class MostrarProductos extends Component
{



    protected $listeners = ['eliminarProducto'];


    public function sumar(Producto $producto)
    {
        
        $producto->cant++;
        $producto->save();
        
        //crear un mensaje
        session()->flash('message-mas', 'Se agrego mas cantidad de stock al producto: '.$producto->nombre);
    }

    public function restar(Producto $producto)
    {
        $producto->cant--;
        $producto->save();
        session()->flash('message-menos', 'Se resto  cantidad al producto: '.$producto->nombre);


    }


    public function render()
    {
        $productos = Producto::paginate(5);


        return view('livewire.mostrar-productos', [
            'productos' => $productos
        ]);
    }


    public function eliminarProducto(Producto $producto)
    {
        $producto->delete();
    }
}
