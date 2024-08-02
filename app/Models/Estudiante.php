<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Estudiante extends Model
{
    use HasFactory;
    protected $primaryKey = 'idEstudiante';

    /* public function cursos()
    {
        return $this->belongsToMany(Curso::class, 'estudiante_cursos');
    } */

    public function cursos()
{
    return $this->belongsToMany(Curso::class, 'cursos_estudiantes', 'estudiante_id', 'curso_id');
}

}
