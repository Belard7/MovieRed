<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{

    public function index(Request $request) // 1. Agregar Request $request
    {
        $categoria = $request->input('categoria');

        if ($categoria && $categoria !== 'Todos') {
            $peliculas = Pelicula::where('categoria', $categoria)->get();
        } else {
            $peliculas = Pelicula::all();
        }

        return view('peliculas.index', compact('peliculas', 'categoria'));
    }

public function show(Pelicula $pelicula)
{
    // Carga los comentarios relacionados
    $pelicula->load('comentarios.user');
    return view('peliculas.show', compact('pelicula'));
}
    public function store(Request $request)
{
    $data = $request->validate([
        'titulo' => 'required|string',
        'categoria' => 'required|string',
        'anio' => 'required|integer',
        'imagen' => 'nullable|image|max:2048',
    ]);

    if ($request->hasFile('imagen')) {
        $data['imagen'] = $request->file('imagen')->store('imagenes', 'public');
    }

    $data['user_id'] = auth()->id(); // si usas autenticación

    Pelicula::create($data);

    return redirect()->route('peliculas.index');
}

    public function create()
{
    return view('peliculas.create');
}

    public function edit(Pelicula $pelicula) // 2. Usar la instancia $pelicula
    {
        return view('peliculas.edit', compact('pelicula'));
    }

    public function update(Request $request, Pelicula $pelicula) // 2. Usar la instancia $pelicula
    {
        $pelicula->update($request->except('imagen'));

        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('imagenes', 'public');
            $pelicula->imagen = $path;
        }

        $pelicula->save();
        return redirect()->route('peliculas.index'); 
    }

    public function destroy(Pelicula $pelicula) // 3. Implementar destroy
    {
        $pelicula->delete();
        return redirect()->route('peliculas.index'); 
    }

}
