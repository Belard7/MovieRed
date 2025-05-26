<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Crear nuevo posts sobre una pelicula 
        </h2>
    </x-slot>
    @if ($errors->any())
    <div class="mb-4 text-red-600">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="max-w-xl mx-auto py-8">
        <form method="POST" action="{{ route('peliculas.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="block mb-1">Título</label>
                <input type="text" name="titulo" value="{{ old('titulo') }}" class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
    <label class="block mb-1">Categoría</label>
    <select name="categoria" class="w-full border rounded px-3 py-2" required>
        <option value="">Selecciona una categoría</option>
        <option value="Acción">Acción</option>
        <option value="Drama">Drama</option>
        <option value="Comedia">Comedia</option>
        <option value="Terror">Terror</option>
        <option value="Romance">Romance</option>
    </select>
</div>
            <div class="mb-4">
             <label class="block mb-1">Año</label>
             <input type="number" name="anio" value="{{ old('anio') }}" class="w-full border rounded px-3 py-2" required>
             </div>

            <div class="mb-4">
                <label class="block mb-1">Imagen</label>
                <input type="file" name="imagen" class="w-full border rounded px-3 py-2">
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Crear posts</button>
        </form>
    </div>
</x-app-layout>
