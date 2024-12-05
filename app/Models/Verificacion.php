<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verificacion extends Model
{
    use HasFactory;

    protected $table = 'verificaciones';

    protected $fillable = [
        'id_arrendador', 'id_agencia', 'id_arrendatario', 'fecha_verificacion', 'resultado_verificacion'
    ];

    public function arrendador()
    {
        return $this->belongsTo(Arrendador::class, 'id_arrendador');
    }

    public function agencia()
    {
        return $this->belongsTo(AgenciaArrendamiento::class, 'id_agencia');
    }

    public function arrendatario()
    {
        return $this->belongsTo(Arrendatario::class, 'id_arrendatario');
    }
}

