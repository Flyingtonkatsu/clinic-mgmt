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

	public function index(){
		$redirect = Auth::user()->access_id;

        switch($redirect){
            case 1:
                return redirect('registration');
            case 2:
                return redirect('reception');
            case 3:
            	return redirect('consultation');
            default:
                return view('index');
        }
	}

	public function registration(){
		$access = Auth::user()->access_id;

		if($access == 1 || $access == 0)
        	return view('registration.mainRegistration');
        
		return redirect('index');
    }

	public function reception(){
		$access = Auth::user()->access_id;

		if($access == 2 || $access == 0) {
		return view('reception.patient-list.mainReception')
			->with('registrations', Registration::all())
			->with('vets', Employee::all());
		}

		return redirect('index');
	}

	public function consultation(){
		$access = Auth::user()->access_id;

		if($access == 3 || $access == 0)
			return view('consultation.mainConsultation');

		return redirect('index');
	}

	public function admin(){
		$access = Auth::user()->access_id;

		if($access == 0)
			return view('admin.mainAdmin');

		return redirect('index');
	}
}