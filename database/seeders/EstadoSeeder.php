<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\estado;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        estado::firstOrCreate([
            'name'=>'Activo'
        ]);
        estado::firstOrCreate([
            'name'=>'Inactivo'
        ]);

    }
}
