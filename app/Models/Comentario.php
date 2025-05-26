<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable = [
        'pelicula_id',
        'user_id',
        'contenido',
    ];

    public function user()
{
    return $this->belongsTo(User::class);
}
public function pelicula()
{
    return $this->belongsTo(Pelicula::class);
}
}
