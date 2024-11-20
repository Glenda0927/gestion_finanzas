<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogoTipoMovimientosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('catalogo_tipo_movimientos')->insert([
            ['id' => 1, 'nombre' => 'Ingreso'],
            ['id' => 2, 'nombre' => 'Egreso'],
        ]);
    }
}
