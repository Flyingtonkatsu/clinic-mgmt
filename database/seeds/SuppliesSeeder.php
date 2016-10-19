<?php

use Illuminate\Database\Seeder;
use App\Models\Supply;
use App\Models\SupplyTransaction;
use App\Models\SupplyCategory;

class SuppliesSeeder extends Seeder
{
    public function run()
    {

    // -----------
	// Categories:
    	SupplyCategory::create([
    		'name' => 'Tablets and Capsules'
		]);

		SupplyCategory::create([
    		'name' => 'Syrup'
		]);

		SupplyCategory::create([
    		'name' => 'Imported Tablets and Capsules'
		]);
	// -----------

	// -----------
	// Supplies:
        Supply::create([
        	'description' => 'Biogesic 500mg',
        	'uom' => 'Box',
        	'uom_qty' => 50,
        	'selling_price' => 8, 
        	'cost' => 250,
        	'category_id' => 1
    	]);

    	Supply::create([
        	'description' => 'Biogesic 250mg',
        	'uom' => 'Box',
        	'uom_qty' => 50,
        	'selling_price' => 8, 
        	'cost' => 250,
        	'category_id' => 1
    	]);
	// -----------
    }
}
