<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleIngreso extends Model
{
    use HasFactory;

    protected $table = 'detalle_ingreso';
    protected $primaryKey = 'id_detalle_ingreso';
    protected $fillable = ['id_detalle_ingreso', 'id_ingreso', 'id_material', 'cantidad_adquirida'];

    public function material()
    {
        return $this->belongsTo(Material::class, 'id_material', 'id_material');
    }

    public function ingreso()
    {
        return $this->belongsTo(Ingreso::class, 'id_ingreso', 'id_ingreso');
    }

    public function detallesSalida()
    {
        return $this->hasMany(DetalleSalida::class, 'id_detalle_ingreso', 'id_detalle_ingreso');
    }

    public function getStockLoteAttribute()
    {
        $salido = $this->detallesSalida()->sum('cantidad_salida');
        return $this->cantidad_adquirida - $salido;
    }
}
