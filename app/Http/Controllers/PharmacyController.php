<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Models\MedRequest;
use Illuminate\Support\Facades\DB;
use DateTime;

class PharmacyController extends Controller
{
	public function __construct() {
        $this->middleware('auth');
    }

    public function getTableMedRequests(){
    	$med_requests = MedRequest::all();

    	return view('pharmacy.med-requests.tableMedRequests');
    }

    public function getViewMedRequests(){
    	return view('pharmacy.med-requests.viewMedRequests');
    }

}