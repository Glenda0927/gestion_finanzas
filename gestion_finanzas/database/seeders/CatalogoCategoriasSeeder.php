<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatalogoCategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $catalogoCategorias = [
            ['id' => 1, 'nombre' => 'Alimentación'],
            ['id' => 2, 'nombre' => 'Transporte'],
            ['id' => 3, 'nombre' => 'Salud'],
            ['id' => 4, 'nombre' => 'Educación'],
            ['id' => 5, 'nombre' => 'Entretenimiento'],
            ['id' => 6, 'nombre' => 'Vivienda'],
            ['id' => 7, 'nombre' => 'Servicios'],
            ['id' => 8, 'nombre' => 'Ropa'],
            ['id' => 9, 'nombre' => 'Otros'],
        ];
    }
}
