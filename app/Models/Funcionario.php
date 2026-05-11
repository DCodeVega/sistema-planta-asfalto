<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    protected $table = 'funcionario';
    protected $primaryKey = 'id_funcionario';
    protected $fillable = ['id_funcionario', 'nombre', 'cargo', 'area'];

    public function salidas()
    {
        return $this->hasMany(Salida::class, 'id_funcionario', 'id_funcionario');
    }
}
