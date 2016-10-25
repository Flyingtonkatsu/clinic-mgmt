<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Registration;
use App\Models\Client;
use App\Models\Patient;
use App\Models\User;
use App\Models\SupplyCategory;
use App\Models\Supply;
use App\Models\Lab;
use App\Models\LabRequest;
use App\Models\MedRequest;
use App\Models\Employee;
use App\Models\Consult;

class ConsultationController extends Controller
{
    private $status_after_consult = 'Billing';
    private $status_before_consult = 'Registered';

    public function __construct(){
        $this->middleware('auth');
    }

    public function getViewPatientList(){
        return view('consultation.patient-list.viewPatientList');
    }

    public function getPatientList(Request $request){
        $user = Auth::user();
        $employee_id = $user->employee_id;
        $registrations = Registration::where('vet_id', $employee_id)->where(DB::raw('DAY(created_at)'), '=', date('d'));
        $registrations = $registrations
                        ->where('status', '!=', $this->status_before_consult)
                        ->where('status', '!=', $this->status_after_consult)
                        ->get();
        $clients = Client::all();
        $patients = Patient::all();

        return view('consultation.patient-list.listPatientList')
            ->with('registrations', $registrations)
            ->with('clients', $clients)
            ->with('patients', $patients);
    }

    public function getLabRequestsTable(Request $request){
        $consult_id = $request->input('consult_id');
        $labs = Lab::all();
        $lab_requests = LabRequest::where('consult_id', $consult_id)->get();
        return view('consultation.new-consultation.tableLabs')
                ->with('labs', $labs)
                ->with('lab_requests', $lab_requests);
    }

    public function getViewNewConsultation(Request $request){
        $client_id = $request->input('client_id');
        $patient_id = $request->input('patient_id');
        $reg_id = $request->input("reg_id");

        $client = Client::find($client_id);
        $patient = Patient::find($patient_id);
        $reg = Registration::find($reg_id);
        $vet_id = $reg->vet_id;
        $vet = Employee::find($vet_id);
        $meds = Supply::all();  // ----- Filter by joining Supply and Supply Category

        $reg->update(["status" => $reg->purpose]);
        $consult = Consult::where('reg_id', $reg_id)->first();

        if($consult == null){
            $consult = Consult::create([
                'client_id' => $client_id,
                'patient_id' => $patient_id,
                'reg_id' => $reg_id,
                'vet_id' => $vet_id,
                'purpose' => $reg->purpose,
                'weight' => $reg->weight
            ]);
            $med_requests = null;
        }
        else {
            $med_requests = MedRequest::where('consult_id', $consult->id)->get();
        }


        return view('consultation.new-consultation.viewNewConsultation')
            ->with('patient', $patient)
            ->with('consult', $consult)
            ->with('vet', $vet)
            ->with('client', $client)
            ->with('meds', $meds)
            ->with('med_requests', $med_requests);
    }

    public function saveConsult(Request $request){
        $consult_id = $request->input('consult_id');
        $txt_examination = $request->input('txt_examination');
        $txt_diff_diag = $request->input('txt_diff_diag');
        $txt_consult_diag = $request->input('txt_consult_diag');
        $txt_notes = $request->input('txt_notes');
        $txt_regime_script = $request->input('txt_regime_script');

        $consult = Consult::find($consult_id);
        $reg = Registration::find($consult->reg_id);

        $reg->update(['status' => $this->status_after_consult]);
        $consult->update([
            'txt_examination' => $txt_examination,
            'txt_diff_diag' => $txt_diff_diag,
            'txt_consult_diag' => $txt_consult_diag,
            'txt_notes' => $txt_notes,
            'txt_regime_script' => $txt_regime_script
            ]);
    }

    public function sendLabRequest(Request $request){
        $consult_id = $request->input('consult_id');
        $lab_id = $request->input('lab_id');

        LabRequest::create([
            'lab_id' => $lab_id,
            'consult_id' => $consult_id,
            'results' => 'PENDING TEST',
            'status' => 'Requested'
        ]);
    }

    public function getLabRequest(Request $request){
        $consult_id = $request->input('consult_id');
        $lab_id = $request->input('lab_id');
        $lab_request = LabRequest::where(['consult_id' => $consult_id, 'lab_id' => $lab_id])->first();

        return response()->json(['request' => $lab_request]);
    }

    public function prescribeMed(Request $request){
        $med_id = $request->input('med_id');
        $consult_id = $request->input('consult_id');
        $qty = $request->input('qty');
        $consult = Consult::find($consult_id);
        $vet_id = $consult->vet_id;

        MedRequest::create([
            'med_id' => $med_id,
            'consult_id' => $consult_id,
            'qty' => $qty,
            'status' => 'Requested',
            'vet_id' => $vet_id
        ]);

        return view('consultation.new-consultation.tableMeds')
            ->with('med_requests', MedRequest::all())
            ->with('meds', Supply::all());
    }
}