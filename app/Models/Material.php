<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $table = 'material';
    protected $primaryKey = 'id_material';
    protected $fillable = ['id_material', 'nombre', 'descripcion', 'id_unidad_medida'];

    public function unidadMedida()
    {
        return $this->belongsTo(UnidadMedida::class, 'id_unidad_medida', 'id_medida');
    }

    public function detallesIngreso()
    {
        return $this->hasMany(DetalleIngreso::class, 'id_material', 'id_material');
    }
}