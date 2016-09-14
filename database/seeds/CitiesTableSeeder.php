<?php

use Illuminate\Database\Seeder;
use App\Models\City;

class CitiesTableSeeder extends Seeder
{
    public function run()
    {

        City::create([
            'name' => 'Mandaluyong City'
        ]);

        City::create([
            'name' => 'Pasig City'
        ]);

        City::create([
            'name' => 'Quezon City'
        ]);

        City::create([
            'name' => 'Manila'
        ]);

        City::create([
            'name' => 'Marikina City'
        ]);

        City::create([
            'name' => 'Makati City'
        ]);
    }
}
