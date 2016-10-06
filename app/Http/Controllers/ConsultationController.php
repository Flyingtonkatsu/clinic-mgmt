<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Registration;
use App\Models\Client;
use App\Models\Patient;
use App\Models\User;
use App\Models\Med;
use App\Models\ConsultMed;
use App\Models\Employee;
use App\Models\Consult;

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
        $registrations = Registration::where(['vet_id' => $employee_id, 'status' => 'Queued'])->where(DB::raw('DAY(created_at)'), '=', date('d'))->get();
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
        $reg_id = $request->input("reg_id");
        $client = Client::find($client_id);
        $patient = Patient::find($patient_id);
        $reg = Registration::find($reg_id);
        $meds = Med::all();
        $vet = Employee::find($reg->vet_id);

        $reg->update(["status" => $reg->purpose]);

        $consult = Consult::create([
            'client_id' => $client_id,
            'patient_id' => $patient_id,
            'purpose' => $reg->purpose,
            'weight' => $reg->weight
        ]);

        return view('consultation.new-consultation.viewNewConsultation')
            ->with('patient', $patient)
            ->with('consult', $consult)
            ->with('vet', $vet)
            ->with('client', $client)
            ->with('meds', $meds);
    }


    public function issueMed(Request $request){
        $med_id = $request->input('med_id');
        $consult_id = $request->input('consult_id');
        $qty = $request->input('qty');

        // Check for qty onhand here

        ConsultMed::create([
            'med_id' => $med_id,
            'consult_id' => $consult_id,
            'qty' => $qty    
        ]);


        // Request should be received by Pharmacist module here
    }
}