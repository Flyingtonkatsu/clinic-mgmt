<?php

namespace App\models;
use Illuminate\Database\Eloquent\Model;


class Supply extends Model {
	protected $table = 'supplies_mstr';
	protected $fillable = array(
		'description', 'uom', 'uom_qty', 'selling_price', 'cost', 'category_id'
		);
	public $timestamps = false;
}