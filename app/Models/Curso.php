<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    protected $primaryKey = 'idCurso';

    protected $fillable = ['grado', 'seccion', 'docente_id'];

        public function docente()
    {
        return $this->belongsTo(Docente::class);
    }

        public function estudiantes()
    {
        return $this->belongsToMany(Estudiante::class, 'cursos_estudiantes', 'curso_id', 'estudiante_id');
    }

    public function matriculas()
        {
            return $this->hasMany(Matricula::class, 'curso_id');
        }
}
