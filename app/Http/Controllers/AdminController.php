<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\models\Employee;
use App\models\Position;
use App\User;
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
		$users = User::all();

		return view('admin.employee-reg.viewEmployeeReg')
				->with('positions', $positions)
				->with('users', $users);
	}

	public function getViewEmployeeList(Request $request){
		$employees = Employee::all();

		return view('admin.employee-list.viewEmployeeList')
				->with('employees', $employees);
	}


	public function registerNewEmployee(Request $request){
		$username = $request->input('username');
		$password = $request->input('password');

		$firstname = $request->input('firstname');
		$lastname = $request->input('lastname');
		$initials = $request->input('initials');
		$position_id = $request->input('position_id');
		$access_id = Position::find($position_id)->access_id;

		$employee = Employee::create([
        	'firstname' => $firstname,
        	'lastname' => $lastname,
        	'initials' => $initials,
        	'position_id' => $position_id,
    	]);

		User::create([
            'username' => $username,
            'password' => bcrypt($password),
            'access_id' => $access_id,
            'employee_id' => $employee->id
        ]);
 
		return response()->json(['response'=>'ok']);
	}
}