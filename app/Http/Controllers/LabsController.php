<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\LabRequest;
use App\Models\Employee;
use App\Models\Patient;
use App\Models\Lab;
use App\Models\Consult;
use Illuminate\Support\Facades\DB;
use DateTime;

class LabsController extends Controller
{
	public function __construct() {
        $this->middleware('auth');
    }

    public function getTableLabRequests(){
    	$lab_requests = LabRequest::where('completed', 0)->get();
        $vets = Employee::all();
        $labs = Lab::all();
        $consults = Consult::all();
        $patients = Patient::all();

    	return view('labs.lab-requests.tableLabRequests')
                ->with('requests', $lab_requests)
                ->with('vets', $vets)
                ->with('labs', $labs)
                ->with('patients', $patients)
                ->with('consults', $consults);
    }

    public function getViewLabRequests(){
    	return view('labs.lab-requests.viewLabRequests');
    }

    public function updateLabResults(Request $request){
        $request_id = $request->input('request_id');
        $results = $request->input('results');
        $lab_request = LabRequest::find($request_id);

        $lab_request->update(['results' => $results, 'completed' => 1]);
        return response()->json(['status' => 'ok']);
    }

}