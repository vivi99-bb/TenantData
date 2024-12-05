<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arrendatario extends Model
{
    use HasFactory;

    protected $table = 'arrendatarios';
    protected $primaryKey = 'id_arrendatario';


    protected $fillable = [
        'id_usuario', 'identificacion', 'telefono', 'email', 
        'direccion_actual', 'estado_cumplimiento_pagos', 'referencias_personales'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario', 'id_usuario');
        
        
    }

    public function historiales()
    {
        return $this->hasMany(HistorialArrendamiento::class, 'id_arrendatario');
    }

    public function verificaciones()
    {
        return $this->hasMany(Verificacion::class, 'id_arrendatario');
    }

    public function propiedades()
    {
    return $this->hasMany(Propiedad::class, 'id_arrendador', 'id_usuario');
    }
    
    public function propiedad()
    {
        return $this->hasOne(Propiedad::class, 'direccion', 'direccion_actual');
    }


}

