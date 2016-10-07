<?php

namespace App\models;
use Illuminate\Database\Eloquent\Model;


class MedRequest extends Model {
	protected $table = 'med_requests';

	protected $fillable = array(
		'consult_id', 'med_id', 'qty'
		);
}