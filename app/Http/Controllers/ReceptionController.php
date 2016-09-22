<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Models\Registration;
use App\Models\Client;
use App\Models\Employee;
use App\Models\Patient;
use App\Models\Specie;
use App\Models\Breed;
use Illuminate\Support\Facades\DB;
use DateTime;

class ReceptionController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function regUpdate(Request $request){
        $field = $request->input('field');
        $value = $request->input('value');
        $id = $request->input('id');
        $reg = Registration::find($id);

        $reg->update([
            $field => $value
            ]);

        return response()->json(['status' => 'ok', 'message' => 'Successfully updated registration record!', 'value' => $value]);
    }


    public function getRegistration(Request $request){
        $registration = Registration::where( DB::raw('DAY(created_at)'), '=', date('d'))->get();
        $vets = Employee::where('position', 'Vet')->get();

        return view('reception.patient-list.tableRegistration')
            ->with('registrations', $registration)
            ->with('vets', $vets);
    }

    public function verifyClient(Request $request){
        $id = $request->input('reg_id');
        $client_id = $request->input('client_id');
        $reg = Registration::where('id', $id)->first();
        $reg->update(['client_verified' => '1', 'client_id' => $client_id]);

        return response()->json($reg);
    }

    public function getNewPatientForm(Request $request){
        $client_id = $request->input('client_id');
        $patient_name = $request->input('patient_name');
        $reg_id = $request->input('reg_id');
        $species = Specie::all();
        $client = Client::find($client_id);
        $client_name = $client->lastname . ', ' . $client->firstname;

        return view('reception.patient-list.newpatient.formNewPatient')
            ->with('client_id', $client_id)
            ->with('reg_id', $reg_id)
            ->with('patient_name', $patient_name)
            ->with('client_name', $client_name)
            ->with('species', $species);
    }

    public function verifyPatient(Request $request){
        $id = $request->input('reg_id');
        $patient_id = $request->input('patient_id');
        $reg = Registration::where('id', $id)->first();
        $reg->update(['patient_id' => $patient_id, 'patient_verified' => 1]);
    }

    public function newPatient(Request $request){
        $client_id = $request->input('client_id');
        $reg_id = $request->input('reg_id');
        $name = $request->input('patient_name');
        $birthdate = $request->input('birthdate');
        $color = $request->input('color');
        $breed = $request->input('breed');
        $species = $request->input('species');
        $gender = $request->input('gender');

        $patient = Patient::create([
            'name' => $name,
            'birthdate' => $birthdate,
            'color' => $color,
            'breed' => $breed,
            'species' => $species,
            'gender' => $gender,
            'client_id' => $client_id
        ]);

        $patient_id = $patient->id;
        $reg_entry = Registration::find($reg_id);
        $reg_entry->update(['patient_verified' => 1, 'patient_id' => $patient_id]);

        return response()->json(['patient' => $patient->toArray(), 'response' => 'ok']);
    }

    public function getPatients(Request $request){
        $client_id = $request->input('client_id');
        $reg_id = $request->input('reg_id');
        $patient_name = $request->input('patient_name');
        $patients = Patient::where([
            'name' => $patient_name,
            'client_id' => $client_id
            ])->get();
        $client = Client::find($client_id);
        $client_name = $client->lastname . ", " . $client->firstname;

        return response()
            ->json(['view' => view('reception.patient-list.verifypatient.tableGetPatients')
            ->with('patients', $patients)
            ->with('reg_id', $reg_id)
            ->with('count', $patients->count())
            ->with('client_id', $client_id)
            ->with('patient_name', $patient_name)
            ->render(),
            'client_name' => $client_name
            ]);
    }

    public function getBreeds(Request $request){
        $species = $request->input('species');
        $breeds = Breed::where('species', $species)->get(['name']);
        return response()->json(['breeds' => $breeds]);
    }

    public function newClient(Request $request){
        $id = $request->input('reg_id');
        $reg = Registration::where('id', $id)->first();
        $reg->update(['edited' => '1']);
    }

    public function getClients(Request $request){
        $id = $request->input('id');
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');   
        $clients = Client::where(['firstname' => $firstname, 'lastname' => $lastname])->get();

        return response()->json(['view' => view('reception.patient-list.verifyclient.tableGetClients')
                ->with('clients', $clients)
                ->with('reg_id', $id)
                ->render()]);
    }
}