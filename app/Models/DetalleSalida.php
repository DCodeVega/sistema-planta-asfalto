<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleSalida extends Model
{
    use HasFactory;

    protected $table = 'detalle_salida';
    protected $primaryKey = 'id_detalle_salida';
    protected $fillable = ['id_detalle_salida', 'id_salida', 'id_detalle_ingreso', 'cantidad_salida'];

    public function salida()
    {
        return $this->belongsTo(Salida::class, 'id_salida', 'id_salida');
    }

    public function detalleIngreso()
    {
        return $this->belongsTo(DetalleIngreso::class, 'id_detalle_ingreso', 'id_detalle_ingreso');
    }
}
