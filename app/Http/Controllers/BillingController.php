<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Payment;
use App\Models\Consult;
use App\Models\Patient;
use App\Models\Client;
use App\Models\Registration;

class BillingController extends Controller {
	private $billing_status = 'Billing';
	private $paid_status = 'Completed';

	public function __construct() {
	    $this->middleware('auth');
	}

	public function getViewBilling(Request $r) {
		return view('reception.billing.viewBilling');
	}

	public function getTableBillingClients(Request $r) {
		$billing_reg = Registration::where('status', $this->billing_status)->get();
		$consults = Consult::all();

		return view('reception.billing.tableBillingClients')
				->with('clients', $billing_reg)
				->with('consults', $consults);
	}

	public function getClientPayments(Request $r) {
		$consult_id = $r->input('consult_id');
		$consult = Consult::find($consult_id);
		$reg_id = $consult->reg_id;
		$reg = Registration::find($reg_id);
		$payments = Payment::where('consult_id', $consult_id)->get();
		$client = Client::find($consult->client_id);
		$patient = Patient::find($consult->patient_id);

		return view('reception.billing.tableClientCheckout')
				->with('payments', $payments)
				->with('client', $client)
				->with('patient', $patient)
				->with('consult_id', $consult_id)
				->with('reg_id', $reg_id);
	}

	public function checkoutClient(Request $request){
		$data = $request->input();
		$reg_id = 0;

		foreach($data as $item){
			if($item)
			$id = $item["id"];
			$paid = $item["paid"];
			$reg_id = $item["reg_id"];
			$payment = Payment::find($id);
			$payment->update(["refused" => $paid, "paid" => 1]);
			
		}

		$reg = Registration::find($reg_id);
		$reg->update(['status' => $this->paid_status]);
	}
}