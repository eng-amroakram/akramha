<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $regions = [
            1 => "الرياض",
            2 => "الشرقيه",
            3 => "جده",
            4 => "مكه",
            5 => "ينبع",
            6 => "حفر الباطن",
            7 => "المدينة المنورة",
            8 => "الطائف",
            9 => "تبوك",
            10 => "القصيم",
            11 => "الحائل",
            12 => "أبها",
            13 => "عسير",
            14 => "عرعر",
            15 => "الجوف",
            16 => "نجران",
            17 => "جيزان"
        ];

        foreach ($regions as $region) {
            Region::create([
                "name" => $region,
                "status" => "active",
            ]);
        }
    }
}
