<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use App\Models\Client;
use App\Models\City;

class RegistrationController extends Controller
{
    
    public function registerNewClient(Request $request) {
        $reg = Registration::where('edited', 1)->first();
        $reg->update(['edited' => 0]);

        $client = Client::create([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'landline' => $request->input('landline'),
            'mobile' => $request->input('mobile'),
            'address' => $request->input('address'),
            'birthday' => $request->input('birthday'),
            'city' => $request->input('city')
            ]);

        return redirect()->action('PagesController@registration');
    }

    public function getEditedReg(Request $request) {
        $reg = Registration::where('edited', 1)->first();
        
        return response()->json($reg);
    }

    public function registerInQueue(Request $request) {
        $firstname = $request->get('clientname')['firstname'];
        $lastname = $request->get('clientname')['lastname'];
        $patients = $request->get('patients');
        $patient_count = 0;

        if($patients == null)
            return response()->json(['state' => 'error', 'message' => 'Please enter patient name(s)']);
        
        for($i=1; $i<= 10; $i++){
            if(array_key_exists("patient" . $i, $patients)){

                Registration::create([
                    'client_fname' => $firstname,
                    'client_lname' => $lastname,
                    'patient_name' => $patients["patient" . $i],
                    'edited' => 0,
                    'client_verified' => 0,
                    'patient_verified' => 0,
                    'purpose' => '',
                    'weight' => '',
                    'client_id' => '',
                    'vet_id' => '', 
                    'room' => '',
                    'status' => 'Registered'
                ]);
                $patient_count++;
            }
        
}
        return response()->json(['state' => 'success', 'message' => 'Successfully registered!', 'firstname' => $firstname, 'lastname'=> $lastname, 'patients' => $patients]);
    }

    public function registrationNewClientForm(){
        return view('registration.newclient.mainNewClient')
            ->with('cities', City::all());
    }
}