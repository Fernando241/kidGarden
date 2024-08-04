<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;
    protected $fillable = ['tipo_documento', 'documento', 'nombres', 'apellidos', 'fecha_nacimiento', 'grado', 'tipo_documento_padre', 'documento_padre', 'nombres_padre', 'apellidos_padre', 'telefono', 'direccion', 'correo', 'parentesco'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
