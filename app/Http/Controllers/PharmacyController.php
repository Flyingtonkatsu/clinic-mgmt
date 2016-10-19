<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Models\MedRequest;
use App\Models\Employee;
use App\Models\Supply;
use Illuminate\Support\Facades\DB;
use DateTime;

class PharmacyController extends Controller
{
	public function __construct() {
        $this->middleware('auth');
    }

    public function getTableMedRequests(){
    	$med_requests = MedRequest::all();
        $vets = Employee::all();
        $meds = Supply::all();

    	return view('pharmacy.med-requests.tableMedRequests')
                ->with('med_requests', $med_requests)
                ->with('vets', $vets)
                ->with('meds', $meds);
    }

    public function getViewMedRequests(){
    	return view('pharmacy.med-requests.viewMedRequests');
    }

}