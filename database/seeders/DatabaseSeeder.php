<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Curso;
use App\Models\Docente;
use App\Models\Noticia;
use App\Models\Acudiente;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\RoleSeeder;
use App\Models\Estudiante; //importante es necesario importar el modelo antes de usarlo

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        Estudiante::Factory(100)->create();

        Docente::Factory(10)->create();

        /* Curso::Factory(10)->create(); */

        Noticia::factory(5)->create();

        $this->call(RoleSeeder::class);

        /* $this->call(ValoresSeeder::class); */

         /* Estudiante::factory()->count(50)->create(); */

        /* User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]); */

        User::create([
            'name' => 'Fernando Rolón',
            'email' => 'fhernatural@gmail.com',
            'password' => bcrypt('Luis1234'),
        ])->assignRole('SuperAdmin');

        User::factory(30)->create();
    }
}
