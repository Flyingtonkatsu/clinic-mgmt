<?php

use Illuminate\Database\Seeder;
use App\Models\Lab;

class LabsTableSeeder extends Seeder{
	
	public function run()
	{
		Lab::create(['name' => 'Blood', 'kit_id' => 0]);
		Lab::create(['name' => 'Urine', 'kit_id' => 0]);
		Lab::create(['name' => 'XRay', 'kit_id' => 0]);
		Lab::create(['name' => 'Parvo', 'kit_id' => 0]);
		Lab::create(['name' => 'Stool', 'kit_id' => 0]);
	}
}