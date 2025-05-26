<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $pelicula->titulo }}
        </h2>
    </x-slot>

    <div class="max-w-2xl mx-auto py-8">
        <p><strong>Categoría:</strong> {{ $pelicula->categoria }}</p>
        <p><strong>Año:</strong> {{ $pelicula->anio }}</p>
        @if($pelicula->imagen)
            <img src="{{ asset('storage/' . $pelicula->imagen) }}" class="w-64 my-4 rounded">
        @endif

        <h3 class="text-lg font-bold mt-6 mb-2">Comentarios</h3>
        @forelse($pelicula->comentarios as $comentario)
            <div class="mb-2 border-b pb-2">
                <strong>{{ $comentario->user->name ?? 'Anónimo' }}</strong>
                <span class="ml-2 text-yellow-500">
                    {{-- Mostrar estrellas --}}
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($comentario->rating >= $i)
                            ★
                        @else
                            ☆
                        @endif
                    @endfor
                </span>
                <p>{{ $comentario->contenido }}</p>
            </div>
        @empty
            <p>No hay comentarios aún.</p>
        @endforelse

        @auth
        <form method="POST" action="{{ route('comentarios.store') }}" class="mt-6">
            @csrf
            <textarea name="contenido" class="w-full border rounded px-3 py-2 mb-2" required placeholder="Escribe un comentario..."></textarea>
            <div class="mb-2">
                <label>Calificación:</label>
                <select name="rating" class="border rounded px-2 py-1" required>
                    <option value="">Selecciona</option>
                    @for ($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}">{{ $i }} estrella{{ $i > 1 ? 's' : '' }}</option>
                    @endfor
                </select>
            </div>
            <input type="hidden" name="pelicula_id" value="{{ $pelicula->id }}">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Comentar</button>
        </form>
        @endauth
    </div>
</x-app-layout>