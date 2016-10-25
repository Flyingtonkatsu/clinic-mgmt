<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Models\MedRequest;
use App\Models\Employee;
use App\Models\Supply;
use App\Models\Pharmacy;
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
        $med_supplies = Pharmacy::orderBy('created_at')->get();

    	return view('pharmacy.med-requests.tableMedRequests')
                ->with('med_requests', $med_requests)
                ->with('vets', $vets)
                ->with('meds', $meds)
                ->with('med_supplies', $med_supplies);
    }

    public function getViewMedRequests(){
    	return view('pharmacy.med-requests.viewMedRequests');
    }

    public function prepareMed(Request $request){
        $request_id = $request->input('request_id');
        $request = MedRequest::find($request_id);
        $request->update(['status' => 'Prepared']);

        return response()->json(['status' => 'ok']);
    }

}