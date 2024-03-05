<x-app-layout>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500"">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Titulo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Contenido
                    </th>
                    <th scope="col" class="px-6 py-3" colspan="2">
                        Acción
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($publicaciones as $publicacion)
                    <tr class="bg-white border-b">
                        <th scope="row"
                            class="w-auto px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            <a class="text-blue-500 blue" href="{{ route('publicaciones.show', $publicacion) }}">
                                {{ $publicacion->titulo }}
                            </a>
                        </th>
                        <td class="px-6 py-4">
                            {{ $publicacion->contenido }}
                        </td>
                        <td>
                            <a href="{{ route('publicaciones.edit', ['publicacion' => $publicacion]) }}"
                                class="font-medium text-blue-600 hover:underline">
                                <x-primary-button>
                                    Editar
                                </x-primary-button>
                            </a>
                        </td>
                        <td class="px-6 py-4">
                            <form action="{{ route('publicaciones.destroy', ['publicacion' => $publicacion]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <x-primary-button class="bg-red-500">
                                    Borrar
                                </x-primary-button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <form action="{{ route('publicaciones.create') }}" class="flex justify-center mt-4 mb-4">
            <x-primary-button class="bg-green-500">Insertar una nueva publicacion</x-primary-button>
        </form>
    </div>
</x-app-layout>
