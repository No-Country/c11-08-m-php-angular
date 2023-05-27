<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $url =  "https://apis.datos.gob.ar/georef/api/provincias";

        $provinces = file_get_contents($url);
            
        $provincesArray = json_decode($provinces, true);
        
        foreach ($provincesArray['provincias'] as $key => $value) {
            //guardar en BD
            $province = Province::updateOrCreate(
                [
                    'name' => $value['nombre'],
                ]
            );
            CitySeeder::storeDepartmentsByProvince($value['id'], $province['id']);
        }
    }
}
