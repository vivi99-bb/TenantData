<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arrendador extends Model
{
    use HasFactory;

    protected $table = 'arrendadores';

    protected $fillable = ['id_usuario', 'identificacion', 'direccion', 'telefono', 'tel_contacto', 'correo_electronico'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    public function propiedades()
    {
        return $this->hasMany(Propiedad::class, 'id_arrendador');
    }

    public function verificaciones()
    {
        return $this->hasMany(Verificacion::class, 'id_arrendador');
    }
}

