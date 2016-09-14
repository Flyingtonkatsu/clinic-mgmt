<?php

use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientsTableSeeder extends Seeder
{
    public function run()
    {

        Client::create([
            'firstname'  => 'John', 
            'lastname'  => 'Doe',
            'address' => 'Taytay',
            'email' => 'johndoe@email.com',
            'birthday' => 'Feb 12 1985',
            'landline' => '6453829',
            'mobile' => '09324543767'
        ]);

        Client::create([
            'firstname' => 'Juan',
            'lastname' => 'dela Cruz',
            'address' => 'Pasig City',
            'email' => 'jdc@gmail.com',
            'birthday' => 'Apr 02 1994',
            'landline' => '2842002',
            'mobile' => '09152839732'
        ]);

        Client::create([
            'firstname' => 'Juan',
            'lastname' => 'dela Cruz',
            'address' => 'Marikina City',
            'email' => 'dcruz.jaun@gmail.com',
            'birthday' => 'Nov 02 1985',
            'landline' => '6582931',
            'mobile' => '09996473829'
        ]);

    }
}
