<?php

use Illuminate\Database\Seeder;
use App\Models\Med;

class MedsTableSeeder extends Seeder
{
    public function run()
    {
        Med::create([
            'name' => 'Med0102',
            'qty_onhand' => 100,
            'qty_minimum' => 0
        ]);

        Med::create([
            'name' => 'Med2194',
            'qty_onhand' => 100,
            'qty_minimum' => 0
        ]);

        Med::create([
            'name' => 'Med5032',
            'qty_onhand' => 100,
            'qty_minimum' => 0
        ]);

        Med::create([
            'name' => 'Med5729',
            'qty_onhand' => 100,
            'qty_minimum' => 0
        ]);

        Med::create([
            'name' => 'Med4879',
            'qty_onhand' => 100,
            'qty_minimum' => 0
        ]);
    }

}