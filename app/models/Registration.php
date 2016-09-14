<?php

namespace App\models;
use Illuminate\Database\Eloquent\Model;


class Registration extends Model {
	protected $fillable = array(
		'client_fname', 'client_lname',
		'patient_name', 'edited', 'client_verified',
		'patient_verified', 'purpose', 'weight',
		'vet_id', 'room', 'client_id', 'patient_id', 'status'
		);

	public $timestamps = true;
}