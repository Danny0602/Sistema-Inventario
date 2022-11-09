<?php

namespace App\Http\Livewire;

use App\Models\Proveedor;
use Livewire\Component;

class MostrarProveedor extends Component
{
    protected $listeners  = ['eliminarProveedor'];

    public function eliminarProveedor(Proveedor $proveedor)
    {
        // dd('eliminando');
        $proveedor->delete();
    }



    public function render()
    {
        $proveedores = Proveedor::paginate(5);
        return view('livewire.mostrar-proveedor',[
            'proveedores' => $proveedores
        ]);
    }
}
