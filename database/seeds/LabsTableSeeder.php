<?php

use Illuminate\Database\Seeder;
use App\Models\Lab;

class LabsTableSeeder extends Seeder{
	
	public function run()
	{
		Lab::create(['name' => 'Blood']);
		Lab::create(['name' => 'Urine']);
		Lab::create(['name' => 'XRay']);
		Lab::create(['name' => 'Parvo']);
		Lab::create(['name' => 'Stool']);
	}
}