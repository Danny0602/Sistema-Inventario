<form wire:submit.prevent="editarProducto" class="space-y-5 md:w-1/2" novalidate>


    <div>
        <x-input-label for="nombre_producto" :value="__('Nombre Producto')" />

        <x-text-input wire:model='nombre_producto' id="nombre_producto" class="block w-full mt-1" type="text"
            :value="old('nombre_producto')" />

        <x-input-error :messages="$errors->get('nombre_producto')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="proveedor" :value="__('Proveedor')" />

        <select
            class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            wire:model="proveedor" id="proveedor">
            <option value="">-- Seleccione --</option>
            @foreach ($proveedores as $proveedor)
            <option value="{{$proveedor->id}}">{{$proveedor->nombre_empresa}}</option>

            @endforeach
        </select>

        <x-input-error :messages="$errors->get('proveedor')" class="mt-2" />
    </div>

    

    <div>
        <x-input-label for="codigo" :value="__('Codigo producto')" />

        <x-text-input id="codigo" class="block w-full mt-1" type="text" wire:model="codigo"
            :value="old('codigo')" />

        <x-input-error :messages="$errors->get('codigo')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="cantidad" :value="__('Cantidad disponible')" />

        <x-text-input id="cantidad" class="block w-full mt-1" type="number" min="1" wire:model="cantidad"
            :value="old('cantidad')" />

        <x-input-error :messages="$errors->get('cantidad')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="imp" :value="__('Imp')" />

        <x-text-input id="imp" class="block w-full mt-1" type="text" wire:model="imp"
            :value="old('imp')" />

        <x-input-error :messages="$errors->get('imp')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="precio_individual" :value="__('Precio individual ')" />

        <x-text-input id="precio_individual" class="block w-full mt-1" type="text" wire:model="precio_individual"
            :value="old('precio_individual')" />

        <x-input-error :messages="$errors->get('precio_individual')" class="mt-2" />
    </div>

    

    <div>
        <x-input-label for="imagen" :value="__('Imagen Actual')" />

        <x-text-input accept="image/*" id="imagen" class="block w-full mt-1" type="file" wire:model="imagen_nueva" />
        <div class="my-5 w-80">
            <x-input-label for="imagen" :value="__('Imagen Actual')" />
            <img src="{{ asset('storage/productos/'.$imagen)}}" alt="{{'Imagen vacante ' . $nombre_producto}}">
        </div>
        
        <div class="my-5 w-80">
            @if ($imagen_nueva)
            Imagen_nueva:
            <img src="{{$imagen_nueva->temporaryUrl()}}" alt="imagen temporal de subida">
                
            @endif
        </div>
        <x-input-error :messages="$errors->get('imagen')" class="mt-2" />
    </div>

    <div>
        <x-primary-button class="justify-center w-full py-3 text-base font-black bg-red-600 hover:text-black hover:bg-red-600">Guardar Cambios</x-primary-button>
    </div>
</form>