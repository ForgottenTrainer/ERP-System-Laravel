<div>
    <form wire:submit.prevent="submit" class="mt-5">
        @csrf
        <div class="mb-6">
            {{ $name }}
            <x-label for="name" :value="__('Nombre')" />
            <x-input id="name" class="block mt-1 w-full" type="text" wire:model="name" />
            @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <div class="mb-6">
            <x-label for="email" :value="__('Correo')" />
            <x-input id="email" class="block mt-1 w-full" type="email" wire:model="email" />
            @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <div class="mb-6">
            <x-label for="mobile" :value="__('Telefono')" />
            <x-input id="mobile" class="block mt-1 w-full" type="number" wire:model="mobile" />
            @error('mobile') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <x-button class="mt-4">
            {{ __('Crear') }}
        </x-button>
    </form>
    @livewireScripts
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        document.addEventListener('livewire:load', function () { // Use 'livewire:load' for better timing
            window.livewire.on('companyStored', (message) => {
                Swal.fire({
                    title: "Excelente",
                    text: message,
                    icon: "success"
                });
            });
        });
    </script>
    

    
</div>
