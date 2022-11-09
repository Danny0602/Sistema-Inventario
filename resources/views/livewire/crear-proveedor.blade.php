
    <form wire:submit.prevent="submit" class="md:w-1/2 space-y-5" novalidate>


        <div>
            <x-input-label for="nombre_empresa" :value="__('Nombre Empresa')" />

            <x-text-input wire:model='nombre_empresa' id="nombre_empresa" class="block mt-1 w-full" type="text"
                :value="old('nombre_empresa')" />

            <x-input-error :messages="$errors->get('nombre_empresa')" class="mt-2" />
        </div>

        

        

        <div>
            <x-input-label for="nombre_vendedor" :value="__('Nombre Vendedor')" />

            <x-text-input id="nombre_vendedor" class="block mt-1 w-full" type="text" wire:model="nombre_vendedor"
                :value="old('nombre_vendedor')" />

            <x-input-error :messages="$errors->get('nombre_vendedor')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="codigo_ruta" :value="__('Codigo de la ruta')" />

            <x-text-input id="codigo_ruta" class="block mt-1 w-full" type="text" min="1" wire:model="codigo_ruta"
                :value="old('codigo_ruta')" />

            <x-input-error :messages="$errors->get('codigo_ruta')" class="mt-2" />
        </div>
       
        <div>
            <x-primary-button class="w-full justify-center py-3 font-black text-base bg-red-600 hover:text-black hover:bg-red-600">Agregar producto</x-primary-button>
        </div>
    </form>

