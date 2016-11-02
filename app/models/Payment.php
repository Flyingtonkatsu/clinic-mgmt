<?php

namespace App\models;
use Illuminate\Database\Eloquent\Model;


class Payment extends Model {
	protected $table = 'payments';
	protected $fillable = array(
		'consult_id', 'client_id', 'patient_id',
		'item', 'price', 'qty', 'paid', 'refused'
		);
}