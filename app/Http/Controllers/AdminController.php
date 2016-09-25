<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\models\Employee;
use App\models\Position;
use App\models\Registration;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }
	
	public function getViewEmployeeRegistration(Request $request){
		$positions = Position::all();

		return view('admin.employee-reg.viewEmployeeReg')
				->with('positions', $positions);
	}

	public function getViewEmployeeList(Request $request){
		$employees = Employee::all();

		return view('admin.employee-list.viewEmployeeList')
				->with('employees', $employees);
	}
}