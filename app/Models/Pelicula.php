<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
     protected $fillable = [
        'titulo',
        'categoria',
        'anio',
        'imagen',
        'user_id',
    ];
    
public function comentarios()
{
    return $this->hasMany(Comentario::class);
}

}
