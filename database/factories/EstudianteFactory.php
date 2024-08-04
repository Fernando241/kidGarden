<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Estudiante>
 */
class EstudianteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tipo_documento'=>$this->faker->randomElement(['nacido vivo', 'registro civil', 'tarjeta de identidad', 'tarjeta de extranjería']),
            'documento'=>$this->faker->numberBetween(88100000, 1024000000),
            'nombres'=>$this->faker->name(),
            'apellidos'=>$this->faker->lastName(),
            'fecha_nacimiento'=>$this->faker->date(),
            'grado'=>$this->faker->randomElement(['Parvulos', 'Pre Jardin', 'Jardin', 'Transicion']),
            'acudiente_id'=>$this->faker->randomElement([1,2,3,4,5]),
        ];
    }
}
