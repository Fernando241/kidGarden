<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Estudiante; //importante es necesario importar el modelo antes de usarlo
use App\Models\Docente;
use App\Models\Curso;
use App\Models\Acudiente;
use App\Models\Noticia;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //User::factory()->create();

        Estudiante::Factory(100)->create();

        Docente::Factory(10)->create();

        Curso::Factory(10)->create();

        Acudiente::Factory(10)->create();

        Noticia::factory(5)->create();

        $this->call(RolSeeder::class);

         /* Estudiante::factory()->count(50)->create(); */

        /* $estudiante = new Estudiante();
        $estudiante->documento = "89765765";
        $estudiante->nombres = "Jose Luis";
        $estudiante->apellidos = "Rojas Espitia";
        $estudiante->telefono = "3112223445";
        $estudiante->direccion = "Calle 1 12-39 Comuneros";
        $estudiante->correo = "joselrojas@gmail.com";
        $estudiante->save(); */

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        /* $estudiante = new Estudiante();
        Desde aquí podemos agregar datos manualmente */


    }
}
