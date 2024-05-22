<x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ __('Crear Item') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <x-validation-errors class="mb-4" />
                @if (session('success'))
                <script>
                    Swal.fire({
                        title: "Excelente",
                        text: "{{ session('success') }}",
                        icon: "success"
                    });
                </script>

                @endif

                <form action="{{ route('item.create') }}" class="mt-5" method="POST">
                    @csrf
                    <div class="mb-6">
                        <x-label for="name" value="{{ __('Nombre') }}"/>
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"  />
                    </div>
                    <div class="mb-6">
                        <x-label for="description" value="{{ __('Descripcion') }}"/>
                        <x-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')"  />
                    </div>
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="mb-6 group">
                            <x-label for="Precio" value="{{ __('Precio') }}"/>
                            <x-input id="precio" class="block mt-1 w-full" type="number" name="price" :value="old('price')"  />
                        </div>
                        <div class="mb-6 group">
                            <x-label for="Impuesto" value="{{ __('Impuesto') }}"/>
                            <x-input id="impuesto" class="block mt-1 w-full" type="number" name="tax" :value="old('tax')"  />
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="mb-6 group">
                            <x-label for="hsn_code" value="{{ __('hsn_code') }}"/>
                            <x-input id="hsn_code" class="block mt-1 w-full" type="text" name="hsn_code" :value="old('hsn_code')"  />
                        </div>
                        <div class="mb-6 group">
                            <x-label for="sac_code" value="{{ __('sac_code') }}"/>
                            <x-input id="sac_code" class="block mt-1 w-full" type="text" name="sac_code" :value="old('sac_code')"  />
                        </div>
                    </div>
                    <x-button class="mt-4">
                        {{ __('Crear')}}
                    </x-button>
                </form> 

                
            </div>
        </div>
    </div>
</x-app-layout>