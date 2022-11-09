<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Proveedores') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session()->has('message'))

            <div class="uppercase bg-green-100 border border-green-600 text-green-600 p-2 font-bold my-3">

                {{ session('message') }}

            </div>

        @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <livewire:mostrar-proveedor />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
