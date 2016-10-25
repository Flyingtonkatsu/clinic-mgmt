<?php

namespace App\models;
use Illuminate\Database\Eloquent\Model;


class Lab extends Model {
	protected $fillable = array(
		'name', 'kit_id', 'svc_price'
		);
	
	public $timestamps = false;
}