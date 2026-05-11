<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UnidadMedida;
use App\Models\Material;
use App\Models\Ingreso;
use App\Models\DetalleIngreso;
use App\Models\Funcionario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Unidades de medida
        UnidadMedida::insert([
            ['id_medida' => 1, 'nombre' => 'KG'],
            ['id_medida' => 2, 'nombre' => 'LITRO'],
            ['id_medida' => 3, 'nombre' => 'M3'],
        ]);

        // Materiales
        Material::insert([
            ['id_material' => 101, 'nombre' => 'Cemento Asfáltico', 'id_unidad_medida' => 1],
            ['id_material' => 102, 'nombre' => 'Asfalto en frío', 'id_unidad_medida' => 1],
        ]);

        // Ingreso cabecera
        $ingreso = Ingreso::create([
            'id_ingreso' => 5001,
            'proyecto' => 'Mantenimiento Vial "Renueva Vía"',
            'fecha_adquirida' => '2024-03-10',
            'odc' => 'ANPE/UACM/ODC/024/24'
        ]);

        // Detalle ingreso
        DetalleIngreso::insert([
            ['id_detalle_ingreso' => 8001, 'id_material' => 101, 'id_ingreso' => 5001, 'cantidad_adquirida' => 74250.00],
            ['id_detalle_ingreso' => 8002, 'id_material' => 102, 'id_ingreso' => 5001, 'cantidad_adquirida' => 10000.00],
        ]);

        // Funcionarios
        Funcionario::insert([
            ['id_funcionario' => 201, 'nombre' => 'Carlos Mamani', 'cargo' => 'Responsable de Planta', 'area' => 'Unidad Mantenimiento'],
            ['id_funcionario' => 202, 'nombre' => 'Lucia Fernandez', 'cargo' => 'Operador de Planta', 'area' => 'Producción Asfáltica'],
        ]);
    }
}
