<?php

namespace App\models;
use Illuminate\Database\Eloquent\Model;


class Med extends Model {
	protected $fillable = array(
		'name', 'qty_onhand', 'qty_minimum'
		);
	
	public $timestamps = false;
}