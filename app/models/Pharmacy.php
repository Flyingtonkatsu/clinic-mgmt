<?php

namespace App\models;
use Illuminate\Database\Eloquent\Model;


class Pharmacy extends Model {
	protected $table = 'pharmacy';
	protected $fillable = array(
		'med_id', 'qty_onhand', 'qty_safe', 'qty_debit', 
		'qty_credit', 'request_id', 'delivery_cert_num'
		);
	
}