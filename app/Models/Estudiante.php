<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Estudiante extends Model
{
    use HasFactory;
    protected $primaryKey = 'idEstudiante';

    protected $fillable = [
        'tipo_documento',
        'documento',
        'nombres',
        'apellidos',
        'fecha_nacimiento',
        'grado',
        'acudiente_id'
    ];

        public function acudiente()
    {
        return $this->belongsTo(Acudiente::class);
    }

        public function cursos()
    {
        return $this->belongsToMany(Curso::class, 'cursos_estudiantes', 'estudiante_id', 'curso_id');
    }

}
