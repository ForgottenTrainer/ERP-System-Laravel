<x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ $type->name }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4 mb-5">
                <section class="container px-4 mx-auto">
                    @if (session('success'))
                        <script>
                            Swal.fire({
                                title: "Excelente",
                                text: "{{ session('success') }}",
                                icon: "success"
                            });
                        </script>
                    @endif

                    <div class="sm:flex sm:items-center sm:justify-between">
                        <h2 class="text-lg font-medium text-gray-800 mt-10">{{ $type->name }}</h2>
                        @can('create '. $type->name)
                            <div class="flex items-center mt-4 gap-x-3">
                                <a href="{{ route('document.create', $type->slug) }}" class="flex items-center justify-center w-1/2 px-5 py-2 shadow-lg text-sm tracking-wide text-white transition-colors duration-200 bg-indigo-500 rounded-lg sm:w-auto gap-x-2 hover:bg-indigo-600">
                                    Agregar {{ $type->name }}
                                </a>
                            </div>
                        @endcan
                    </div>

                    <p class="mt-1 text-sm text-gray-500">Aquí están los documentos registrados.</p>

                    <div class="flex flex-col mt-6">
                        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                <div class="overflow-hidden border border-gray-200 md:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500">
                                                    <button class="flex items-center gap-x-3 focus:outline-none">
                                                        <span>Título</span>
                                                        <svg class="h-3" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M2.13347 0.0999756H2.98516L5.01902 4.79058H3.86226L3.45549 3.79907H1.63772L1.24366 4.79058H0.0996094L2.13347 0.0999756ZM2.54025 1.46012L1.96822 2.92196H3.11227L2.54025 1.46012Z" fill="currentColor" stroke="currentColor" stroke-width="0.1" />
                                                            <path d="M0.722656 9.60832L3.09974 6.78633H0.811638V5.87109H4.35819V6.78633L2.01925 9.60832H4.43446V10.5617H0.722656V9.60832Z" fill="currentColor" stroke="currentColor" stroke-width="0.1" />
                                                            <path d="M8.45558 7.25664V7.40664H8.60558H9.66065C9.72481 7.40664 9.74667 7.42274 9.75141 7.42691C9.75148 7.42808 9.75146 7.42993 9.75116 7.43262C9.75001 7.44265 9.74458 7.46304 9.72525 7.49314C9.72522 7.4932 9.72518 7.49326 9.72514 7.49332L7.86959 10.3529L7.86924 10.3534C7.83227 10.4109 7.79863 10.418 7.78568 10.418C7.77272 10.418 7.73908 10.4109 7.70211 10.3534L7.70177 10.3529L5.84621 7.49332C5.84617 7.49325 5.84612 7.49318 5.84608 7.49311C5.82677 7.46302 5.82135 7.44264 5.8202 7.43262C5.81989 7.42993 5.81987 7.42808 5.81994 7.42691C5.82469 7.42274 5.84655 7.40664 5.91071 7.40664H6.96578H7.11578V7.25664V0.633865C7.11578 0.42434 7.29014 0.249976 7.49967 0.249976H8.07169C8.28121 0.249976 8.45558 0.42434 8.45558 0.633865V7.25664Z" fill="currentColor" stroke="currentColor" stroke-width="0.3" />
                                                        </svg>
                                                    </button>
                                                </th>
                                                <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                                    Número
                                                </th>
                                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                                    Acción
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach ($documents as $i)
                                            <tr>
                                                <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                    <div>
                                                        <h2 class="font-medium text-gray-800">{{ $i->title }}</h2>
                                                    </div>
                                                </td>
                                                <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                    <div>
                                                        <h4 class="text-gray-700">{{ $i->document_number }}</h4>
                                                    </div>
                                                </td>
                                                <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                    <div class="flex items-center gap-x-6">
                                                        @can('edit '. $type->name)
                                                            <a href="{{ route('document.edit', [ $i->id]) }}" class="cursor-pointer text-gray-500 transition-colors duration-200 dark:hover:text-yellow-500 hover:text-yellow-500 focus:outline-none">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                                </svg>
                                                            </a>
                                                        @endcan
                                                        @can('delete '. $type->name)
                                                            <button id="deleteButton-{{ $i->id }}" class="text-gray-500 transition-colors duration-200 hover:text-red-500 focus:outline-none">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                                </svg>
                                                            </button>
                                                            <form id="delete-{{ $i->id }}" action="{{ route('document.delete', $i->id) }}" method="post" style="display:none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        @endcan
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-10">
                        {{ $documents->links() }}
                    </div>
                </section>
            </div>
        </div>
    </div>

    @foreach ($documents as $i)
    <script>
        document.getElementById('deleteButton-{{ $i->id }}').addEventListener('click', function() {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, bórralo!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-{{ $i->id }}').submit();
                }
            });
        });
    </script>
    @endforeach
</x-app-layout>
