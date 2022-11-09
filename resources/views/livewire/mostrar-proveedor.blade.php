<div>

    <div class="overflow-x-auto relative">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border">
            <thead class="border text-xs text-gray-700 uppercase bg-gray-50 dark:text-gray-40">
                <tr class="border">


                    <th scope="col" class="text-center p-2 border font-bold text-black text-sm">
                        Nombre empresa
                    </th>
                    <th scope="col" class="text-center p-2 border font-bold text-black text-sm">
                        Nombre chofer
                    </th>
                    <th scope="col" class="text-center p-2 border font-bold text-black text-sm">
                        Codigo de la ruta
                    </th>
                    <th scope="col" class="text-center p-2 border font-bold text-black text-sm">
                        Agregado
                    </th>
                    <th scope="col" class="text-center p-2 border font-bold text-black text-sm">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($proveedores as $proveedor )
                <tr class="bg-white border-b">


                    <td class="text-center border text-gray-700 text-base font-bold">
                        {{$proveedor->nombre_empresa}}
                    </td>
                    <td class="text-center border text-gray-700 text-base font-bold">
                        {{$proveedor->nombre_vendedor}}
                    </td>
                    <td class="text-center border text-gray-700 text-base font-bold">
                        {{$proveedor->codigo_ruta}}
                    </td>
                    <td class="text-center border text-gray-700 text-base font-bold">
                        {{$proveedor->created_at->diffForHumans()}}
                    </td>
                    <td class="text-center  border">
                        <div class="flex flex-col justify-between gap-3 px-4 py-4">

                            <a href="{{route('proveedores.edit',$proveedor)}}"
                                class="bg-black py-2 px-4 rounded-lg text-center text-white  text-sm uppercase  font-bold">Editar</a>
                            <a wire:click="$emit('eliminar',{{$proveedor->id}})"
                                class="bg-red-600 py-2 px-4 rounded-lg text-center text-white  text-sm uppercase  font-bold">Eliminar</a>
                        </div>
                    </td>





                </tr>
                @empty

                @endforelse

            </tbody>

        </table>
        <div class="my-5">
            {{$proveedores->links()}}
        </div>
    </div>

</div>



@push('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Livewire.on('eliminar', proveedor_id => {
        Swal.fire({
        title: 'Deseas eliminar el proveedor?',
        text: "No podras volver a recuperar la informacion del proveedor!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Eliminar!',
        cancelButtonText: 'Cancelar',
        }).then((result) => {
        if (result.isConfirmed) {
            Livewire.emit('eliminarProveedor',proveedor_id);
            Swal.fire(
            'Eliminado!',
            'Se ha borrado de forma permanente',
            'success'
            )
        }
        })
    })
    
</script>

@endpush