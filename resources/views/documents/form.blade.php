<x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ __('Administrar ' . $type->name) }}
        </h2>
    </x-slot>
    @livewire('document.form', ['type' => $type, 'document' => $document])
</x-app-layout>
