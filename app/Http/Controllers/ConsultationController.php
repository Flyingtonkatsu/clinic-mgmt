<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Registration;
use App\Models\Client;
use App\Models\Patient;
use App\Models\User;
use App\Models\Employee;

class ConsultationController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function getViewPatientList(){
        return view('consultation.patient-list.viewPatientList');
    }

    public function getPatientList(Request $request){
        $user = Auth::user();
        $employee_id = $user->employee_id;
        $registrations = Registration::where(['vet_id' => $employee_id])->where(DB::raw('DAY(created_at)'), '=', date('d'))->get();
        $clients = Client::all();
        $patients = Patient::all();

        return view('consultation.patient-list.listPatientList')
            ->with('registrations', $registrations)
            ->with('clients', $clients)
            ->with('patients', $patients);
    }

    public function getViewNewConsultation(Request $request){
        $client_id = $request->input('client_id');
        $patient_id = $request->input('patient_id');
        $client = Client::find($client_id);
        $patient = Patient::find($patient_id);

        return view('consultation.new-consultation.viewNewConsultation')
            ->with('patient', $patient)
            ->with('client', $client);
    }
}