<?php

namespace App\models;
use Illuminate\Database\Eloquent\Model;


class Consult extends Model {
	protected $fillable = array(
		'id', 'patient_id', 'client_id', 'reg_id',
		'txt_examination', 'txt_diff_diag',
		'txt_consult_diag', 'txt_notes',
		'txt_regime_script', 'purpose', 'weight'
		);
}