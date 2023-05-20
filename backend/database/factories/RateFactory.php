<?php

namespace Database\Factories;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rate>
 */
class RateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'type' => fake()->randomElement(['1 Clase', '2 Clases', '4 Clases']),
            'price' => fake()->randomFloat(2, 100, 600), //crear intervalos de precios para cada tipo
            'active' => fake()->boolean(60),
            'teacher_id' => Teacher::factory()
        ];
    }
}
