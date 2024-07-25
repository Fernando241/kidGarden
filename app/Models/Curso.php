<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    protected $primaryKey = 'idCurso';

    //relacion a tabla docentes
    public function docente()
    {
        return $this->belongsTo(Docente::class, 'docente_id');
    }

    //relacion a tabla estudiantes
    public function estudiantes()
    {
        return $this->belongsToMany(Estudiante::class, 'estudiante_curso');
    }
}
