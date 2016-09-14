<?php

use Illuminate\Database\Seeder;
use App\User;

class LoginsTableSeeder extends Seeder
{
    public function run()
    {

        User::create([
            'username' => 'reception',
            'password' => bcrypt('password'),
            'access_id' => 1
        ]);

        User::create([
            'username' => 'registration',
            'password' => bcrypt('password'),
            'access_id' => 2
        ]);

        User::create([
            'username' => 'root',
            'password' => bcrypt('password'),
            'access_id' => 0
        ]);
    }
}
