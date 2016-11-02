<?php
Route::get('logout', function(){
	Auth::logout();
});
Route::auth();

// Routes for Pages Controller
Route::get('/', 'PagesController@index');
Route::get('home', 'PagesController@index');
Route::get('index', 'PagesController@index');
Route::get('reception', 'PagesController@reception');
Route::get('consultation', 'PagesController@consultation');
Route::get('registration', 'PagesController@registration');
Route::get('admin', 'PagesController@admin');
Route::get('pharmacy', 'PagesController@pharmacy');
Route::get('labs', 'PagesController@labs');

// Routes for Registration Controller
// GET Requests
Route::get('registration/viewNewClient', 'RegistrationController@getViewNewClient');
Route::get('registration/viewQueue', 'RegistrationController@getViewQueue');
Route::get('registration/getEditedReg', 'RegistrationController@getEditedReg');
// POST Requests
Route::post('registration/newclient', 'RegistrationController@registerNewClient');
Route::post('registration/registerinqueue', 'RegistrationController@registerInQueue');


// Routes for Reception Controller
// GET Requests
Route::get('reception/viewRegTable', 'ReceptionController@getViewRegTable');
Route::get('reception/getregistration', 'ReceptionController@getRegistrationsToday');
// POST Requests
Route::post("reception/verifyClientDetails", 'ReceptionController@getViewClientDetails');
Route::post('reception/verifyclient', 'ReceptionController@verifyClient');
Route::post('reception/newclient', 'ReceptionController@newClient');
Route::post('reception/getclients', 'ReceptionController@getClients');
Route::post("reception/update", 'ReceptionController@regUpdate');
Route::post('reception/getpatients', 'ReceptionController@getPatients');
Route::post('reception/getnewpatientform', 'ReceptionController@getNewPatientForm');
Route::post("reception/getbreeds", 'ReceptionController@getBreeds');
Route::post("reception/addnewclient", 'ReceptionController@newPatient');
Route::post('reception/verifyexistingpatient', 'ReceptionController@verifyPatient');

	//Routes for Billing
	Route::get('reception/getViewBilling', 'BillingController@getViewBilling');
	Route::get('billing/getTableBillingClients', 'BillingController@getTableBillingClients');
	Route::post('billing/getClientPayments', 'BillingController@getClientPayments');
	Route::post('billing/checkoutClient', 'BillingController@checkoutClient');

//Routes for Consultation
Route::get('consultation/viewPatientList', 'ConsultationController@getViewPatientList');
Route::get('consultation/getPatientList', 'ConsultationController@getPatientList');
Route::post('consultation/getViewNewConsultation', 'ConsultationController@getViewNewConsultation');
Route::post('consultation/issueMed', 'ConsultationController@prescribeMed');
Route::post('consultation/sendLabRequest', 'ConsultationController@sendLabRequest');
Route::post('consultation/getLabRequest', 'ConsultationController@getLabRequest');
Route::post('consultation/saveConsult', 'ConsultationController@saveConsult');
Route::post('consultation/getLabRequestsTable', 'ConsultationController@getLabRequestsTable');

//Routes for Pharmacy
Route::get('pharmacy/getViewMedRequests', 'PharmacyController@getViewMedRequests');
Route::get('pharmacy/getTableMedRequests', 'PharmacyController@getTableMedRequests');
Route::post('pharmacy/prepareMed', 'PharmacyController@prepareMed');

//Routes for Labs
Route::get('labs/getViewLabRequests', 'LabsController@getViewLabRequests');
Route::get('labs/getTableLabRequests', 'LabsController@getTableLabRequests');
Route::post('labs/updateLabResults', 'LabsController@updateLabResults');
Route::post('labs/declineLabRequest', 'LabsController@declineLabRequest');

// Routes for Admin Controller
Route::get('admin/employees/viewEmployeeReg', 'AdminController@getViewEmployeeRegistration');
Route::post('admin/registerNewEmployee', 'AdminController@registerNewEmployee');
Route::get('admin/breedspecies/viewBreedsSpecies', 'AdminController@getViewBreedsSpecies');
Route::get('admin/breedspecies/getTableSpecies', 'AdminController@getTableSpecies');
Route::post('admin/breedspecies/getTableBreeds', 'AdminController@getTableBreeds');
Route::post('admin/breedspecies/addSpecie', 'AdminController@addSpecie');
Route::post('admin/breedspecies/addBreed', 'AdminController@addBreed');
