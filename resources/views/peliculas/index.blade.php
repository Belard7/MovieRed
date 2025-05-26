<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Películas
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">
        {{-- Filtros por categoría --}}
        @php
            $categorias = ['Todos', 'Acción', 'Drama', 'Comedia', 'Terror', 'Romance'];
            $categoriaSeleccionada = $categoria ?? 'Todos';
        @endphp

        <div class="flex space-x-4 mb-6">
            @foreach ($categorias as $cat)
                <a href="{{ route('peliculas.index', ['categoria' => $cat]) }}"
                   class="px-4 py-2 rounded-lg {{ $cat === $categoriaSeleccionada ? 'bg-blue-600 text-white' : 'bg-gray-200 text-black' }}">
                    {{ $cat }}
                </a>
            @endforeach
        </div>

        <div class="flex justify-end mb-6">
            @auth
                
            
    <a href="{{ route('peliculas.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Crear nueva película
    </a>
    @endauth
</div>  

        {{-- Lista de películas --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @forelse ($peliculas as $pelicula)
                <div class="bg-white rounded shadow p-4">
                  <h2 class="text-xl font-bold">
    <a href="{{ route('peliculas.show', $pelicula) }}" class="text-blue-600 hover:underline">
        {{ $pelicula->titulo }}
    </a>
</h2>
                    <p class="text-sm text-gray-500 mb-2">Categoría: {{ $pelicula->categoria }}</p>
                    @if ($pelicula->imagen)
                        <img src="{{ asset('storage/' . $pelicula->imagen) }}" alt="{{ $pelicula->titulo }}" class="w-full rounded">
                    @endif
                </div>
            @empty
                <p>No hay películas en esta categoría.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>