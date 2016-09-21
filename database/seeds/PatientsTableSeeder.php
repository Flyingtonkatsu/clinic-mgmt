<?php

use Illuminate\Database\Seeder;
use App\Models\Patient;

class PatientsTableSeeder extends Seeder
{
    public function run()
    {
        Patient::create([
            'name' => 'Fido',
            'breed' => 'Bulldog',
            'species' => 'Canine',
            'color' => 'Brown and white',
            'gender' => 'M',
            'birthdate' => 'Jan 2011',
            'client_id' => 1
        ]);

        Patient::create([
            'name' => 'Bantay',
            'breed' => 'Dobermann',
            'species' => 'Canine',
            'color' => 'Brown and black',
            'gender' => 'M',
            'birthdate' => 'Mar 20 2014',
            'client_id' => 2
        ]);
    }
}
