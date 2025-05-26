<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Película
        </h2>
    </x-slot>

    <div class="max-w-xl mx-auto py-8">
        <form method="POST" action="{{ route('peliculas.update', $pelicula) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-1">Título</label>
                <input type="text" name="titulo" value="{{ old('titulo', $pelicula->titulo) }}" class="w-full border rounded px-3 py-2" required>
            </div>

           <div class="mb-4">
    <label class="block mb-1">Categoría</label>
    <select name="categoria" class="w-full border rounded px-3 py-2" required>
    <option value="">Selecciona una categoría</option>
    <option value="Acción" {{ old('categoria', $pelicula->categoria) == 'Acción' ? 'selected' : '' }}>Acción</option>
    <option value="Drama" {{ old('categoria', $pelicula->categoria) == 'Drama' ? 'selected' : '' }}>Drama</option>
    <option value="Comedia" {{ old('categoria', $pelicula->categoria) == 'Comedia' ? 'selected' : '' }}>Comedia</option>
    <option value="Terror" {{ old('categoria', $pelicula->categoria) == 'Terror' ? 'selected' : '' }}>Terror</option>
    <option value="Romance" {{ old('categoria', $pelicula->categoria) == 'Romance' ? 'selected' : '' }}>Romance</option>
</select>
</div>

            <div class="mb-4">
                <label class="block mb-1">Imagen</label>
                <input type="file" name="imagen" class="w-full border rounded px-3 py-2">
                @if($pelicula->imagen)
                    <img src="{{ asset('storage/' . $pelicula->imagen) }}" alt="{{ $pelicula->titulo }}" class="w-32 mt-2 rounded">
                @endif
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Guardar cambios</button>
        </form>
    </div>
</x-app-layout>