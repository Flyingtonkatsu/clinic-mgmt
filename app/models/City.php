<?php

namespace App\models;
use Illuminate\Database\Eloquent\Model;


class City extends Model {
	protected $fillable = array(
		'name'
		);
	public $timestamps = false;
}