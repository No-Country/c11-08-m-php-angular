<?php

namespace Database\Factories;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $null = [null, null];
        $startMorning = fake()->dateTimeBetween('2023-05-20 08:00:00', '2023-05-20 10:59:00')->format('H').':00';
        $endMorning = fake()->dateTimeBetween('2023-05-20 11:00:00', '2023-05-20 12:59:00')->format('H').':00';
        $startAfternoon = fake()->dateTimeBetween('2023-05-20 12:00:00', '2023-05-20 14:59:00')->format('H').':00';
        $endAfternoon = fake()->dateTimeBetween('2023-05-20 15:00:00', '2023-05-20 18:59:00')->format('H').':00';
        $startNight = fake()->dateTimeBetween('2023-05-20 19:00:00', '2023-05-20 20:59:00')->format('H').':00';
        $endNight = fake()->dateTimeBetween('2023-05-20 21:00:00', '2023-05-20 22:59:00')->format('H').':00';

        $morning = fake()->randomElement([[$startMorning, $endMorning], $null]);
        $afternoon = fake()->randomElement([[$startAfternoon, $endAfternoon], $null]);
        $night = fake()->randomElement([[$startNight, $endNight], $null]);

        $value = (in_array(null, $morning) && in_array(null, $afternoon) && in_array(null, $night)) ? 0 : 1;

        return [
            'day' => fake()->randomElement([1,2,3,4,5,6]),
            'active' => $value,
            'start_morning' => $morning[0],
            'end_morning' => $morning[1],
            'start_afternoon' => $afternoon[0],
            'end_afternoon' => $afternoon[1],
            'start_night' => $night[0],
            'end_night' => $night[1],
            'teacher_id' => Teacher::factory(),
        ];
    }
}
