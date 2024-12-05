<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgenciaArrendamiento extends Model
{
    use HasFactory;

    protected $table = 'agencias_arrendamiento';

    protected $fillable = [
        'id_usuario', 'nombre_agencia', 'direccion', 'telefono', 
        'nit', 'tel_contacto_agencia', 'correo_contacto_agencia'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    public function propiedades()
    {
        return $this->hasMany(Propiedad::class, 'id_agencia');
    }

    public function verificaciones()
    {
        return $this->hasMany(Verificacion::class, 'id_agencia');
    }
}

