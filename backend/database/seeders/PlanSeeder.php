<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::updateOrCreate(
            [
                'id' => 1,
            ],
            [
                'type' => '3 meses',
                'price' => 1899,
                'free_months' => 1,
            ]
        );
        Plan::updateOrCreate(
            [
                'id' => 2,
            ],
            [
                'type' => '6 meses',
                'price' => 2899,
                'free_months' => 2,
            ]
        );
        Plan::updateOrCreate(
            [
                'id' => 3,
            ],
            [
                'type' => '1 año',
                'price' => 3899,
                'free_months' => 3,
            ]
        );
    }
}
