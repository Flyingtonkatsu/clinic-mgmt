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
            'position' => 'Admin',
        ]);

        Employee::create([
            'number' => '2012',
            'firstname' => 'Jona',
            'lastname' => 'Reyes',
            'position' => 'Receptionist',
            'initials' => 'JR'
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
            'firstname' => 'Michael',
            'lastname' => 'de Guia',
            'position' => 'Vet',
            'initials' => 'MdG'
        ]);
    }
}
