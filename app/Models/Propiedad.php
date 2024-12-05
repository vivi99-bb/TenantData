<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propiedad extends Model
{
    use HasFactory;

    protected $table = 'propiedades';
    protected $primaryKey = 'id_propiedad';

    protected $fillable = [
        'id_arrendador', 'id_agencia', 'direccion', 'tipo_propiedad', 'estado'
    ];

    public function arrendador()
    {
        return $this->belongsTo(Arrendador::class, 'id_arrendador');
    }

    public function agencia()
    {
        return $this->belongsTo(AgenciaArrendamiento::class, 'id_agencia');
    }


}
