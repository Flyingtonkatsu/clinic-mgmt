<?php

namespace App\models;
use Illuminate\Database\Eloquent\Model;


class SupplyCategory extends Model {
	protected $table = 'supplies_categories';
	protected $fillable = array(
		'name'
		);
	public $timestamps = false;
}