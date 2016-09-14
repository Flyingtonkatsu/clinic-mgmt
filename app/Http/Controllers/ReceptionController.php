<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Models\Registration;
use App\Models\Client;
use App\Models\Employee;
use App\Models\Patient;
use Illuminate\Support\Facades\DB;
use DateTime;

class ReceptionController extends Controller
{

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

        return view('reception.tableRegistration')
            ->with('registrations', $registration)
            ->with('vets', Employee::all());
    }

    public function verifyClient(Request $request){
        $id = $request->input('reg_id');
        $client_id = $request->input('client_id');
        $reg = Registration::where('id', $id)->first();
        $reg->update(['client_verified' => '1', 'client_id' => $client_id]);

        return response()->json($reg);
    }

    public function verifyPatient(Request $request){
        /*
        $id = $request->input('reg_id');
        $patient_id = $request->input('patient_id');
        $reg = Registration::where('id', $id)->first();
        $reg->update(['patient_id' => '1', 'client' => $patient_id]);
        */
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
            ->json(['view' => view('reception.tableGetPatients')
            ->with('patients', $patients)
            ->with('reg_id', $reg_id)
            ->with('count', $patients->count())
            ->render(),
            'client_name' => $client_name]);
    }

    public function newClient(Request $request)
    {
        $id = $request->input('reg_id');
        $reg = Registration::where('id', $id)->first();
        $reg->update(['edited' => '1']);
    }

    public function getClients(Request $request){
        $id = $request->input('id');
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');   
        $clients = Client::where(['firstname' => $firstname, 'lastname' => $lastname])->get();

        return response()->json(['view' => view('reception.tableGetClients')
                ->with('clients', $clients)
                ->with('reg_id', $id)
                ->render()]);
    }
}