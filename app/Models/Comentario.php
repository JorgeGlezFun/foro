<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Comentario extends Model
{

    protected $fillable = [
        'contenido'
    ];

    use HasFactory;

    public function comentable(): MorphTo
    {
        return $this->morphTo();
    }
}
