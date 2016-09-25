<?php

use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeesTableSeeder extends Seeder
{
    public function run(){
        
        Employee::create([
            'number' => '0000',
            'firstname' => 'Admin',
            'lastname' => 'Admin',
        ]);

        Employee::create([
            'number' => '2012',
            'firstname' => 'Jona',
            'lastname' => 'Reyes',
            'position_id' => 1,
            'initials' => 'JR'
        ]);


        Employee::create([
            'number' => '1001',
            'firstname' => 'Nelson',
            'lastname' => 'Navarro',
            'position_id' => 2,
            'initials' => 'NN'
        ]);

        Employee::create([
            'number' => '2002',
            'firstname' => 'Michael',
            'lastname' => 'de Guia',
            'position_id' => 3,
            'initials' => 'MdG'
        ]);

        Employee::create([
            'number' => '2195',
            'firstname' => 'Mitchel',
            'lastname' => 'Olson',
            'position_id' => 3,
            'initials' => 'MO'
        ]);

        Employee::create([
            'number' => '2753',
            'firstname' => 'Coleman',
            'lastname' => 'Mckinley',
            'position_id' => 3,
            'initials' => 'CM'
        ]);
    }
}
