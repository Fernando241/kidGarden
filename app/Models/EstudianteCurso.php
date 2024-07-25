<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstudianteCurso extends Model
{
    use HasFactory;

    //relacion a la tabla cursos
    public function cursos()
    {
        return $this->belongsToMany(Curso::class, 'alumno_curso');
    }
}
