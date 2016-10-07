<?php

namespace App\models;
use Illuminate\Database\Eloquent\Model;


class LabRequest extends Model {
	protected $table = 'lab_requests';
	protected $fillable = array(
		'lab_id', 'consult_id', 'results'
		);
}