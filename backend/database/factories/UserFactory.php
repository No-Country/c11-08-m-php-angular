<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $gender = fake()->randomElement($array = array ('male','female'));
        $photoWoman = 'https://www.transparentpng.com/thumb/user/female-user-transparent-icon--dOtdVA.png';
        $photoMan = 'https://i.pinimg.com/736x/8b/16/7a/8b167af653c2399dd93b952a48740620.jpg';
        $photo = ($gender == 'male') ? $photoMan : $photoWoman;
        return [
            'role' => fake()->randomElement($array = array ('Profesor','Estudiante')),
            'email' => fake()->unique()->safeEmail(),
            'first_name' => fake('es_ES')->firstName($gender),
            'last_name' => fake('es_ES')->lastName(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'birthdate' => fake()->dateTimeBetween('-50 years', '-25 years')->format('Y-m-d'),
            'identification' => fake('ar_SA')->idNumber,
            'phone' => fake('es_ES')->mobileNumber(),
            'photo' => $photo,
            'city_id' => fake()->numberBetween(1,529),
            'last_connection' => fake()->dateTimeBetween('-60 days', 'now')->format('Y-m-d H:i:s'),
            // 'last_connection' => fake()->dateTimeThisMonth()->format('Y-m-d H:i:s'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
