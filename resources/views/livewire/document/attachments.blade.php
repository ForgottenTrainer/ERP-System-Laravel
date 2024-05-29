<div class="shadow-lg p-5">
    <h3 class="text-xl font-bold mb-3"> Subir imagen </h3>
    <form wire:submit="save" enctype="multipart/form-data">
        <div class="flex gap-2">
            <label for="uploadFile1"
                class="flex bg-gray-800 hover:bg-gray-700 text-white px-3 py-2 outline-none rounded w-max cursor-pointer text-sm font-semibold">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 mr-2 fill-white inline text-sm" viewBox="0 0 32 32">
                <path
                    d="M23.75 11.044a7.99 7.99 0 0 0-15.5-.009A8 8 0 0 0 9 27h3a1 1 0 0 0 0-2H9a6 6 0 0 1-.035-12 1.038 1.038 0 0 0 1.1-.854 5.991 5.991 0 0 1 11.862 0A1.08 1.08 0 0 0 23 13a6 6 0 0 1 0 12h-3a1 1 0 0 0 0 2h3a8 8 0 0 0 .75-15.956z"
                    data-original="#000000" />
                <path
                    d="M20.293 19.707a1 1 0 0 0 1.414-1.414l-5-5a1 1 0 0 0-1.414 0l-5 5a1 1 0 0 0 1.414 1.414L15 16.414V29a1 1 0 0 0 2 0V16.414z"
                    data-original="#000000" />
                </svg>
                CARGAR IMAGEN
                <input type="file" wire:model='file' id='uploadFile1' class="hidden" />
            </label>
     
            @error('file') <span class="text-red-600">{{ $message }}</span> @enderror
     
            <x-button type="submit" class="bg-indigo-600 hover:bg-indigo-800">Adjuntar imagen</x-button>
        </div>
    </form>
</div>
