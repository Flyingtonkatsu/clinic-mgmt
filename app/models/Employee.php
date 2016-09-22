<?php

namespace App\models;
use Illuminate\Database\Eloquent\Model;


class Employee extends Model {

	protected $fillable = array(
		'number', 'firstname',
		'lastname', 'position',
		'initials', 'login_id'
	);
	
}