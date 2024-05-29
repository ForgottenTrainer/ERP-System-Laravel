<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ __('Administrar ' . $type->name) }}
        </h2>
    </x-slot>
    @livewire('document.attachments', ['document' => $document])
</x-app-layout>
