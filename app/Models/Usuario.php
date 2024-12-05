<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use HasFactory;


    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    protected $fillable = ['id_usuario, nombre', 'apellido', 'email', 'contraseña', 'rol'];

    protected $hidden = ['contraseña'];
    public function getAuthPassword()
    {
        return $this->contraseña;
    }

    public function arrendador()
    {
        return $this->hasOne(Arrendador::class, 'id_usuario');
    }

    public function arrendatario()
    {
        return $this->hasOne(Arrendatario::class, 'id_usuario');
    }

    public function agencia()
    {
        return $this->hasOne(AgenciaArrendamiento::class, 'id_usuario');
    }
}

