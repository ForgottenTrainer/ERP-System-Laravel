<x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ __('Crear Empresa') }}
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

                <form  class="mt-5" method="POST">
                    @csrf
                    <div class="mb-6">
                        <x-label for="name" value="{{ __('Nombre') }}"/>
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"  />
                    </div>
                    <div class="mb-6">
                        <x-label for="email" value="{{ __('Correo') }}"/>
                        <x-input id="correo" class="block mt-1 w-full" type="email" name="email" :value="old('email')"  />
                    </div>
                    <div class="mb-6">
                        <x-label for="Telefono" value="{{ __('Telefono') }}"/>
                        <x-input id="telefono" class="block mt-1 w-full" type="number" name="mobile" :value="old('mobile')"  />
                    </div>
                    <x-button class="mt-4">
                        {{ __('Crear')}}
                    </x-button>
                </form> 

                
            </div>
        </div>
    </div>
</x-app-layout>