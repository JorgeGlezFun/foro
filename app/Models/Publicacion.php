<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    protected $table = 'publicaciones';

    protected $fillable = [
        'titulo',
        'contenido'
    ];

    use HasFactory;

    public function comentario(): MorphOne
    {
        return $this->morphOne(Comentario::class, 'comentable');
    }
}
