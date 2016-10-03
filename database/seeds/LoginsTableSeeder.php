<?php

use Illuminate\Database\Seeder;
use App\User;

class LoginsTableSeeder extends Seeder
{
    public function run()
    {

        User::create([
            'username' => 'root',
            'password' => bcrypt('password'),
            'access_id' => 0,
            'employee_id' => 1
        ]);

        User::create([
            'username' => 'registration',
            'password' => bcrypt('password'),
            'access_id' => 1,
            'employee_id' => 2
        ]);

        User::create([
            'username' => 'reception',
            'password' => bcrypt('password'),
            'access_id' => 2,
            'employee_id' => 3
        ]);

        User::create([
            'username' => 'vet1',
            'password' => bcrypt('password'),
            'access_id' => 3,
            'employee_id' => 4
        ]);

        User::create([
            'username' => 'vet2',
            'password' => bcrypt('password'),
            'access_id' => 3,
            'employee_id' => 5
        ]);

        User::create([
            'username' => 'vet3',
            'password' => bcrypt('password'),
            'access_id' => 3,
            'employee_id' => 6
        ]);
    }
}
