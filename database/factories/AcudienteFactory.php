<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Acudiente>
 */
class AcudienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'tipo_documento_acudiente' => $this->faker->randomElement(['cédula de ciudadanía', 'cédula de extranjería']),
        'documento_acudiente' => $this->faker->unique()->numberBetween(88100000, 1024000000),
        'nombres_acudiente' => $this->faker->name(),
        'apellidos_acudiente' => $this->faker->lastName(),
        'telefono' => $this->faker->phoneNumber(),
        'direccion' => $this->faker->address(),
        'correo' => $this->faker->unique()->safeEmail,
        'parentesco' => $this->faker->randomElement(['padre', 'madre', 'abuelo', 'abuela', 'hermano', 'tio']),
        ];
    }
}
