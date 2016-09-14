<?php

namespace App\models;
use Illuminate\Database\Eloquent\Model;


class Specie extends Model {
	protected $fillable = array(
		'name'
		);
	public $timestamps = false;
}