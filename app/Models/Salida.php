<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    use HasFactory;

    protected $table = 'salida';
    protected $primaryKey = 'id_salida';
    protected $fillable = ['id_salida', 'fecha', 'id_funcionario'];

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class, 'id_funcionario', 'id_funcionario');
    }

    public function detalles()
    {
        return $this->hasMany(DetalleSalida::class, 'id_salida', 'id_salida');
    }
}
