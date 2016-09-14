<?php

namespace App\models;
use Illuminate\Database\Eloquent\Model;


class Patient extends Model {
	protected $fillable = array(
		'name', 'breed', 'species',
		'color', 'gender', 'birthdate',
		'neutered', 'client_id'
		);

}