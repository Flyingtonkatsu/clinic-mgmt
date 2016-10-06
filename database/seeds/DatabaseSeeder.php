<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(LoginsTableSeeder::class);
        $this->call(EmployeesTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(BreedSpeciesTableSeeder::class);
        $this->call(PatientsTableSeeder::class);
        $this->call(PositionsTableSeeder::class);
        $this->call(MedsTableSeeder::class);
    }
}
