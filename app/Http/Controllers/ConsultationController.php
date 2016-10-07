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
use App\Models\Lab;
use App\Models\LabRequest;
use App\Models\MedRequest;
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
        $vet = Employee::find($reg->vet_id);
        $meds = Med::all();
        $labs = Lab::all();

        $reg->update(["status" => $reg->purpose]);
        $consult = Consult::where('reg_id', $reg_id)->first();

        if($consult == null){
            $consult = Consult::create([
                'client_id' => $client_id,
                'patient_id' => $patient_id,
                'reg_id' => $reg_id,
                'purpose' => $reg->purpose,
                'weight' => $reg->weight
            ]);
            $lab_requests = null;
            $med_requests = null;
        }
        else {
            $lab_requests = LabRequest::where('consult_id', $consult->id)->get();
            $med_requests = MedRequest::where('consult_id', $consult->id)->get();
        }


        return view('consultation.new-consultation.viewNewConsultation')
            ->with('patient', $patient)
            ->with('consult', $consult)
            ->with('vet', $vet)
            ->with('client', $client)
            ->with('labs', $labs)
            ->with('meds', $meds)
            ->with('med_requests', $med_requests)
            ->with('lab_requests', $lab_requests);
    }

    public function sendLabRequest(Request $request){
        $consult_id = $request->input('consult_id');
        $lab_id = $request->input('lab_id');

        LabRequest::create([
            'lab_id' => $lab_id,
            'consult_id' => $consult_id,
            'results' => 'PENDING TEST'
        ]);
    }

    public function getLabRequest(Request $request){
        $consult_id = $request->input('consult_id');
        $lab_id = $request->input('lab_id');
        $lab_request = LabRequest::where(['consult_id' => $consult_id, 'lab_id' => $lab_id])->first();

        return response()->json(['request' => $lab_request]);
    }

    public function issueMed(Request $request){
        $med_id = $request->input('med_id');
        $consult_id = $request->input('consult_id');
        $qty = $request->input('qty');

        MedRequest::create([
            'med_id' => $med_id,
            'consult_id' => $consult_id,
            'qty' => $qty    
        ]);

        $med = Med::find($med_id);
        $med->update(['qty_onhand', 'qty_onhand' - $qty]);
    }
}