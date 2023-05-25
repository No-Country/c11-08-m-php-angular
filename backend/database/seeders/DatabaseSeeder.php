<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Student;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            ProvinceSeeder::class,
            SubjectSeeder::class,
            UserSeeder::class,
            /*
            StudentSeeder::class,
            TeacherSeeder::class,
            ScheduleSeeder::class,
            //RewiewSeeder::class,
            ClaseSeeder::class,*/
        ]);

    }
}
