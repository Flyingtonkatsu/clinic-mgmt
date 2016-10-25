<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Payment;
use App\Models\Consult;
use App\Models\Client;
use App\Models\Registration;

class BillingController extends Controller {
	private $billing_status = 'Billing';

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

	public function getBillingForClient(Request $r) {
		$reg_id = $r->input('reg_id');
		$reg = Registration::find($reg_id);
		$consult = Consult::where('reg_id', $reg_id)->first();
		$consult_id = $consult->id;
		$payments = Payment::where('consult_id', $consult_id)->get();

		// return view with billing for selected reg
	}
}