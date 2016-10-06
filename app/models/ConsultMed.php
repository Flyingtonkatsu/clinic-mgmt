<?php

namespace App\models;
use Illuminate\Database\Eloquent\Model;


class ConsultMed extends Model {
	protected $table = 'consult_meds';

	protected $fillable = array(
		'consult_id', 'med_id', 'qty'
		);

	public $timestamps = false;
}