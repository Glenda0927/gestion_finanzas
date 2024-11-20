<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatalogoTipoMovimientosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $catalogoTipoMovimientos = [
            ['id' => 1, 'nombre' => 'Ingreso'],
            ['id' => 2, 'nombre' => 'Egreso'],
        ];
    }
}
