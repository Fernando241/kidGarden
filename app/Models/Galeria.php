<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'descripcion'];

    //para hacer la relación con las fotos
    public function fotos()
    {
        return $this->hasMany(Foto::class);
    }
}
