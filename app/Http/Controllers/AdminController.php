<?php

namespace App\Http\Controllers;
use App\models\Employee;
use App\models\Registration;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }
	
	public function getFormEmployeeRegistration(Request $request){
		
	}
}