<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $csv = fopen(database_path('seeders/CSVs/materias.csv'), 'r');
      $length = 0;

      while (($value = fgetcsv($csv, $length)) !== false) {
        Subject::updateOrCreate(
          [
            'name' => $value[0]
          ]
        );
      }
  
    }
}
