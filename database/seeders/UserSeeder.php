<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Super Admin',
            'email' => 'super@gmail.com',
            'phone' => '0599916672',
            'photo' => '',
            'address' => 'home',
            'type' => 'admin',
            'status' => 'active',
            'password' => Hash::make('123456789'),
            // "region_id" => "",
            // "city_id" => "",
            "address" => "",
            "facebook" => "",
            "youtube" => "",
            "linkedin" => "",
            "twitter" => "",
        ]);

        $x = 2;

        $types = ['admin', 'charity', 'donor'];

        while ($x < 15) {
            User::create([
                'name' => 'Demo-' . $x,
                'email' => 'demo-' . $x . '@gmail.com',
                'phone' => '059' . random_int(1111111, 9999999),
                'photo' => '',
                'address' => 'Home',
                'type' => $types[random_int(0, 2)],
                'status' => 'active',
                'password' => Hash::make('123456789'),
                // "region_id" => "",
                // "city_id" => "",
                "address" => "",
                "facebook" => "",
                "youtube" => "",
                "linkedin" => "",
                "twitter" => "",
            ]);

            $x = $x + 1;
        }
    }
}
