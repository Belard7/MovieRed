<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BienvenidaController;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\ComentarioController;
use Illuminate\Support\Facades\Route;

// Ruta principal y listado de películas (público)
Route::get('/', function () {
    return view('welcome');
});
Route::get('/peliculas', [PeliculaController::class, 'index'])->name('peliculas.index');

// Ver detalles de una película (público)
Route::get('/peliculas/{pelicula}', [PeliculaController::class, 'show'])->name('peliculas.show');

// Página de bienvenida (público)
Route::get('/bienvenida', [BienvenidaController::class, 'mostrar']);

// Acciones protegidas por autenticación
Route::middleware('auth')->group(function () {
    // Perfil de usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD de películas
    Route::get('/peliculas/create', [PeliculaController::class, 'create'])->name('peliculas.create');
    Route::post('/peliculas', [PeliculaController::class, 'store'])->name('peliculas.store');
    Route::put('/peliculas/{pelicula}', [PeliculaController::class, 'update'])->name('peliculas.update');
    Route::delete('/peliculas/{pelicula}', [PeliculaController::class, 'destroy'])->name('peliculas.destroy');

    // Comentarios
    Route::post('/comentarios', [ComentarioController::class, 'store'])->name('comentarios.store');
});


// Dashboard 
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';