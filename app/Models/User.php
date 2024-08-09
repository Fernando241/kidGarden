<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use HasRoles;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function adminlte_image()
    {
        return 'https://picsum.photos/300/300';
    }

    public function adminlte_desc()
    {
        /* return 'Administrador(a)'; */
        if ($this->roles->isNotEmpty()) {
            // Obtén el primer rol asignado al usuario
            return $this->roles->first()->name;
        }
    
        // Si no tiene rol, devuelve una cadena vacía
        return 'Invitado';
    }

    public function adminlte_profile_url()
    {
        return 'profile/username';
    }

    //para crear la relación con la solicitud
        public function solicitudes()
    {
        return $this->hasMany(Solicitud::class)->where('estado', 'en_proceso');
    }

}
