<?php

namespace App\models;
use Illuminate\Database\Eloquent\Model;


class Breed extends Model {
	protected $fillable = array(
		'name', 'species'
		);
	public $timestamps = false;
}