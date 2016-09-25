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
            'address' => 'Lt 5, Bk 2, Golden City Subdivision, Brgy. San Pedro',
            'City' => 1,
            'email' => 'johndoe@email.com',
            'birthday' => 'Feb 12 1985',
            'landline' => '6453829',
            'mobile' => '09324543767'
        ]);

        Client::create([
            'firstname' => 'Juan',
            'lastname' => 'dela Cruz',
            'address' => '#24, Apple street, St. Michael Subdivision',
            'City' => 3,
            'email' => 'jdc@gmail.com',
            'birthday' => 'Apr 02 1994',
            'landline' => '2842002',
            'mobile' => '09152839732'
        ]);

        Client::create([
            'firstname' => 'Juan',
            'lastname' => 'dela Cruz',
            'address' => 'Aglipay Rd, White Plains Village',
            'City' => 5,
            'email' => 'dcruz.jaun@gmail.com',
            'birthday' => 'Nov 02 1985',
            'landline' => '6582931',
            'mobile' => '09996473829'
        ]);

    }
}
