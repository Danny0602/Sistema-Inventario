<div>


    <div class="overflow-x-auto relative">
        @if (session()->has('message-mas'))
        <div class="px-2 bg-green-400 rounded-lg font-bold">
            {{ session('message-mas') }}
        </div>
        @elseif (session()->has('message-menos'))
        <div class="px-2 bg-red-400 rounded-lg font-bold">
            {{ session('message-menos') }}
        </div>

        @endif
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border">
            <thead class="border text-xs text-gray-700 uppercase bg-gray-50 dark:text-gray-40">
                <tr class="border">
                    <th scope="col" class="text-center border p-2 font-bold text-black text-sm">
                        Imagen
                    </th>

                    <th scope="col" class="text-center border p-2 font-bold text-black text-sm">
                        Nombre producto
                    </th>
                    <th scope="col" class="text-center border p-2 font-bold text-black text-sm">
                        Proveedor
                    </th>
                    <th scope="col" class="text-center border p-2 font-bold text-black text-sm">
                        Codigo
                    </th>
                    <th scope="col" class="text-center border p-2 font-bold text-black text-sm">
                        Imp
                    </th>
                    <th scope="col" class="text-center border p-2 font-bold text-black text-sm">
                        cantidad stock
                    </th>
                    </th>
                    <th scope="col" class="text-center border p-2 font-bold text-black text-sm">
                        precio c/u
                    </th>
                    </th>
                    <th scope="col" class="text-center border p-2 font-bold text-black text-sm">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($productos as $producto )
                <tr class="bg-white border-b">

                    <td scope="row" class="text-center border p-2 w-28 font-medium text-gray-900 whitespace-nowrap ">
                        <img src="{{asset('storage/productos/'. $producto->imagen)}}" alt="">
                    </td>
                    <td class="text-center border font-bold text-gray-700 text-base">
                        {{$producto->nombre}}
                    </td>
                    <td class="text-center border font-bold text-gray-700 text-base">
                        {{$producto->proveedor->nombre_empresa}}
                    </td>
                    <td class="text-center border font-bold text-gray-700 text-base">
                        {{$producto->codigo}}
                    </td>
                    </td>
                    <td class="text-center border font-bold text-gray-700 text-base">
                        {{$producto->imp}}
                    </td>
                    </td>
                    <td class="items-center  border font-bold text-gray-700 text-base">

                        <div class="flex justify-center gap-2">
                            @if (!$producto->cant <= 0) <svg wire:click="restar({{$producto->id}})"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-6 h-6">
                                <path fill-rule="evenodd"
                                    d="M5.25 12a.75.75 0 01.75-.75h12a.75.75 0 010 1.5H6a.75.75 0 01-.75-.75z"
                                    clip-rule="evenodd" />
                                </svg>
                                
                                @endif
                                
                                 <p class="{{$producto->cant <= "5" ? "text-red-500" :  ($producto->cant <= "10" ? "text-orange-500" : ($producto->cant >= "11" ? "text-green-600" : "text-black")) }}">{{$producto->cant}} U</p>

                                <svg wire:click="sumar({{$producto->id}})" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                </svg>
                        </div>
                    </td>
                    </td>
                    <td class="text-center border font-bold text-gray-700 text-base">
                        $ {{$producto->precio_individual}}
                    </td>
                    <td class="text-center  border">
                        <div class="flex flex-col justify-between gap-3 px-4">
                            <a href="{{route('productos.edit', $producto)}}"
                                class="bg-black py-2 px-4 rounded-lg text-center text-white  text-sm uppercase  font-bold">Editar</a>

                            <a wire:click="$emit('eliminar',{{$producto->id}})"
                                class="bg-red-600 py-2 px-4 rounded-lg text-center text-white  text-sm uppercase  font-bold">Eliminar</a>
                        </div>
                    </td>

                </tr>


                @empty

                @endforelse

            </tbody>
        </table>

        <div class="my-5">
            {{$productos->links()}}
        </div>
    </div>

    @push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Livewire.on('eliminar', productoId => {
            Swal.fire({
            title: 'Deseas eliminar este producto del inventario?',
            text: "No podras volver a recuperar la informacion del producto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminar!',
            cancelButtonText: 'Cancelar',
            }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('eliminarProducto',productoId);
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

</div>