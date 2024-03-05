<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Imagen extends Model
{
    protected $table = 'imagenes';

    protected $fillable = [
        'nombre',
        'url'
    ];

    use HasFactory;

    public function comentario(): MorphOne
    {
        return $this->morphOne(Comentario::class, 'comentable');
    }
}
