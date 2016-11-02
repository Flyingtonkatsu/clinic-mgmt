<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\models\Employee;
use App\models\Position;
use App\models\Specie;
use App\models\Breed;
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



	public function getViewBreedsSpecies(Request $request){
		return view('admin.breeds-species.viewBreedsSpecies');
	}

	public function getTableBreeds(Request $request){
		$specie = $request->input('specie');
		$breeds = Breed::where('species', $specie)->get();
		return view('admin.breeds-species.tableBreeds')
				->with('breeds', $breeds);
	}

	public function getTableSpecies(Request $request){
		$species = Specie::all();
		return view('admin.breeds-species.tableSpecies')
				->with('species', $species);
	}

	public function addSpecie(Request $request){
		$specie_name = $request->input('specie');
		$specie = Specie::where('name', $specie_name);
		if($specie->first()) {
			return response()->json(['status' => 'danger', 'response' => 'Specie exists!']);
		}
		else {
			Specie::create([
				'name' => $specie_name
				]);
			return response()->json(['status' => 'success', 'response' => 'Successfully added specie!']);
		}
	}

	public function addBreed(Request $request){
		$specie = $request->input('specie');
		$breed = $request->input('breed');
		$existing_breed = Breed::where(['species' => $specie, 'name' => $breed]);
		if($existing_breed->first()) {
			return response()->json(['status' => 'danger', 'response' => 'Breed for this species already exists!']);
		}
		else {
			Breed::create([
				'name' => $breed,
				'species' => $specie
				]);
			return response()->json(['status' => 'success', 'response' => 'Successfully added breed!']);
		}
	}
}