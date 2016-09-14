<?php

namespace App\models;
use Illuminate\Database\Eloquent\Model;


class Employee extends Model {

	protected $fillable = array(
		'number', 'first_name',
		'last_name', 'position',
		'initials'
	);
	
}