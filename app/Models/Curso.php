<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    protected $primaryKey = 'idCurso';

    //relacion a tabla docentes
    public function docente()
    {
        return $this->belongsTo(Docente::class);
    }

    //relacion a tabla estudiantes
    public function estudiantes()
    {
        return $this->belongsToMany(Estudiante::class);
    }

}
