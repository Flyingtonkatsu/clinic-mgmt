<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Registration;
use App\Models\Client;
use App\Models\User;
use App\Models\Employee;

class ConsultationController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function getViewPatientList(){
        return view('consultation.patient-list.viewPatientList');
    }

    public function getPatientList(Request $request){
        $user = Auth::user();
        $employee_id = $user->employee_id;
        $patients = Registration::where('vet_id', $employee_id)->get();
        $clients = Client::all();

        return view('consultation.patient-list.listPatientList')
            ->with('patients', $patients)
            ->with('clients', $clients);
    }
}