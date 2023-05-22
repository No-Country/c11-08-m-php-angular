<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate(
            [
                'role' => 'Admin',
                'email' => fake()->unique()->safeEmail(),
            ],
            [
                'first_name' => fake()->firstName(),
                'last_name' => fake()->lastName(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'birthdate' => fake()->dateTimeBetween('-50 years', '-25 years')->format('Y-m-d'),
                'identification' => fake('ar_SA')->idNumber,
                'phone' => fake('en_US')->tollFreePhoneNumber(),
                'photo' => null,
                'city_id' => fake()->numberBetween(1,529),
                'last_connection' => fake()->dateTimeBetween('-60 days', 'now')->format('Y-m-d H:i:s'),
                // 'email_verified_at' => now(),
                // 'remember_token' => Str::random(10),
            ]
        );

    }
}
