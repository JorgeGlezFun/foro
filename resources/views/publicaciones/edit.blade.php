<x-app-layout>
    <div class="w-1/2 mx-auto">
        <form method="POST" action="{{ route('publicaciones.update', ['publicacion' => $publicacion]) }}">
            @csrf
            @method('PUT')
            <div>
                <x-input-label for="titulo" :value="'Titulo'" />
                <x-text-input id="titulo" class="block mt-1 w-full" type="text" name="titulo" :value="old('titulo', $publicacion->titulo)"
                    required autofocus autocomplete="titulo" />
                <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="contenido" :value="'Contenido'" />
                <x-text-input id="contenido" class="block mt-1 w-full" type="text" name="contenido" :value="old('contenido',$publicacion->contenido)"
                    required autofocus autocomplete="contenido" />
                <x-input-error :messages="$errors->get('contenido')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('publicaciones.index') }}">
                    <x-secondary-button class="ms-4">
                        Volver
                    </x-secondary-button>
                </a>
                <x-primary-button class="ms-4">
                    Insertar
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
