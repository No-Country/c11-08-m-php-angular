<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    }

    public static function storeDepartmentsByProvince($id, $province_id)
    {

        $url =  "https://apis.datos.gob.ar/georef/api/departamentos?provincia=$id&max=1000";

        $departments = file_get_contents($url);

        $departmentsArray = json_decode($departments, true);

        foreach ($departmentsArray['departamentos'] as $key => $value) {
            //guardar en BD
            City::updateOrCreate(
                [
                    'name' => $value['nombre'],
                    'province_id' => $province_id
                ]
            );
        }
    }
}
