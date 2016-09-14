<?php

namespace App\models;
use Illuminate\Database\Eloquent\Model;


class Client extends Model {
	protected $fillable = array(
		'firstname', 'lastname',
		'address', 'email',
		'mobile', 'landline', 'birthday', 'city'
		);

}