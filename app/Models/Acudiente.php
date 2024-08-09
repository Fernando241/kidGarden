<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acudiente extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo_documento_acudiente',
        'documento_acudiente',
        'nombre_acudiente',
        'telefono',
        'direccion',
        'correo',
        'parentesco',
        'user_id',
    ];

    public function estudiantes()
    {
        return $this->hasMany(Estudiante::class, 'acudiente_id'); 
    }

    public function matriculas()
    {
        return $this->hasMany(Matricula::class, 'acudiente_id');
    }
}
