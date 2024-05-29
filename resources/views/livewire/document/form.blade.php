<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <x-validation-errors class="mb-4" />
                <form wire:submit.prevent="submit" class="mt-5">
                    <div class="mb-6">
                        <x-label for="title" value="{{ __('Titulo') }}"/>
                        <x-input id="title" class="block mt-1 w-full" type="text" wire:model="title" />
                        @error('title') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-6">
                        <x-label for="document_number" value="{{ __('Numero de documento') }}"/>
                        <x-input id="document_number" class="block mt-1 w-full" type="text" wire:model="document_number" />
                        @error('document_number') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <x-button class="mt-4">
                        Subir al sistema
                    </x-button>
                </form> 
                <hr class="m-5">
                <div class="mt-10">
                    @livewire('document.attachments', ['document' => $document])
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    window.addEventListener('alert', event => {
        Swal.fire({
            title: event.detail.title,
            icon: event.detail.type
        });
    });
</script>
