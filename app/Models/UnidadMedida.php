<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadMedida extends Model
{
    use HasFactory;

    protected $table = 'unidad_medida';
    protected $primaryKey = 'id_medida';
    protected $fillable = ['id_medida', 'nombre'];

    public function materiales()
    {
        return $this->hasMany(Material::class, 'id_unidad_medida', 'id_medida');
    }
}
