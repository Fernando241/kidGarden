<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    protected $fillable = ['galeria_id', 'ruta_fotos'];

    //para relacionar las fotos con la galeria
    public function galeria()
    {
        return $this->belongsTo(Galeria::class);
    }
}
