<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Curso>
 */
class CursoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'grado'=>$this->faker->randomElement(['Parvulos', 'Pre Jardín', 'Jardín', 'Transición']),
            'seccion'=>$this->faker->randomElement([1,2,3]),
        ];
    }
}
