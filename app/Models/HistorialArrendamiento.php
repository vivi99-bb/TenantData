<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialArrendamiento extends Model
{
    use HasFactory;

    protected $table = 'historial_arrendamiento';

    protected $fillable = [
        'id_arrendatario', 'id_propiedad', 'fecha_inicio', 'fecha_fin', 'estado_arrendamiento'
    ];

    public function arrendatario()
    {
        return $this->belongsTo(Arrendatario::class, 'id_arrendatario');
    }

    public function propiedad()
    {
        return $this->belongsTo(Propiedad::class, 'id_propiedad');
    }
}
