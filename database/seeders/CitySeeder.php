<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $regions = [
            1 => ["الخرج", "الدرعية", "الدلم", "الدوادمي", "الحريق", "الزلفي", "السليل", "الغاط", "القويعية", "المجمعة", "المزاحمية", "الهياثم", "ثادق", "حوطة بني تميم", "رماح", "شقراء", "عفيف"],
        ];

        foreach ($regions as $region_id => $cities) {

            foreach ($cities as $city) {
                City::create([
                    "name" => $city,
                    "region_id" => $region_id,
                    "status" => "active",
                ]);
            }
        }
    }
}
