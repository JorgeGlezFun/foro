<x-app-layout>
    <div class="w-1/2 mx-auto">
        <form method="POST" action="{{ route('imagenes.update', ['imagen' => $imagen]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <x-input-label for="nombre" :value="'Nombre'" />
                <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre', $imagen->nombre)"
                    required autofocus autocomplete="nombre" />
                <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="url" :value="'URL'" />
                <input id="url" class="block mt-1 w-full" type="file" name="url">
                <x-input-error :messages="$errors->get('url')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('imagenes.index') }}">
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
