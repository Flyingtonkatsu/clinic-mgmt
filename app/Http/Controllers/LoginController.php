<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Redirect;

class LoginController extends Controller {
	
	public function login(){
			
		$userdata = array(
			'username' => Input::get('username'),
			'password' => Input::get('password')
		);

		if(Auth::attempt($userdata, true)){

			$user = Auth::user();
			switch($user->access_id){
				case 'rc':
					return Redirect::to('reception');
				case 'rg':
					return Redirect::to('registration');
			}
		}

		return Redirect::to('login');
	}

	public function destroy(){
		Auth::logout();
		return view('login');
	}
}