<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Valor;

class ValoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       /*  falta revisar para que realice la migracion con estas semillas */

        Valor::create([
            [
                'nombre' => 'Matricula',
                'valor' => 800000.00,
                'frecuencia_pago' => 'anual',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Pensión',
                'valor' => 300000.00,
                'frecuencia_pago' => 'mensual',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Certificados',
                'valor' => 12000.00,
                'frecuencia_pago' => 'único pago',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Ruta',
                'valor' => 120000.00,
                'frecuencia_pago' => 'mensual',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Clases Extra',
                'valor' => 70000.00,
                'frecuencia_pago' => 'mensual',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
