<?php

use Illuminate\Database\Seeder;
use App\Models\Position;

class PositionsTableSeeder extends Seeder
{
    public function run()
    {
        Position::create([
            'name' => 'Registration Staff',
            'access_id' => 1
        ]);

        Position::create([
            'name' => 'Reception Staff',
            'access_id' => 2
        ]);

        Position::create([
            'name' => 'Veterinarian',
            'access_id' => 3
        ]);
    }
}