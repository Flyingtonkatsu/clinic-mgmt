<?php

use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeesTableSeeder extends Seeder
{
    public function run()
    {

        Employee::create([
            'number' => '1000',
            'firstname' => 'Louis',
            'lastname' => 'Sanchez',
            'position' => 'Vet',
            'initials' => 'LS'
        ]);

        Employee::create([
            'number' => '1001',
            'firstname' => 'Nelson',
            'lastname' => 'Navarro',
            'position' => 'Vet',
            'initials' => 'NN'
        ]);

        Employee::create([
            'number' => '2002',
            'firstname' => 'Joey',
            'lastname' => 'Leoncio',
            'position' => 'Vet',
            'initials' => 'JL'
        ]);

        Employee::create([
            'number' => '2003',
            'firstname' => 'Monica',
            'lastname' => 'Cruz',
            'position' => 'Vet',
            'initials' => 'MC'
        ]);

    }
}
