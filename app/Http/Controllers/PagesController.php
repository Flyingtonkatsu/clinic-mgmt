<?php

namespace App\Http\Controllers;
use App\models\Employee;
use App\models\Registration;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }
	
	public function login(){
		return view('login');
	}

	public function admin(){
		return view('index');
	}

	public function index(){
		$redirect = Auth::user()->access_id;

        switch($redirect){
            case 1:
                return redirect('reception');
            case 2:
                return redirect('registration');
            default:
                return view('index');
        }
	}

	public function reception(){
		return view('reception.mainReception')
			->with('registrations', Registration::all())
			->with('vets', Employee::all());
	}

	public function consultation(){
		return view('consultation.consultation');
	}
}