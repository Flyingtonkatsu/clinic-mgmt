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

// Routes for Registration Controller
// GET Requests
Route::get('registration/viewNewClient', 'RegistrationController@getViewNewClient');
Route::get('registration/viewQueue', 'RegistrationController@getViewQueue');
Route::get('registration/editedreg', 'RegistrationController@getEditedReg');
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

//Routes for Consultation
Route::get('consultation/viewPatientList', 'ConsultationController@getViewPatientList');
Route::get('consultation/getPatientList', 'ConsultationController@getPatientList');

// Routes for Admin Controller
Route::get('admin/viewEmployeeReg', 'AdminController@getViewEmployeeRegistration');
Route::get('admin/viewEmployeeList', 'AdminController@getViewEmployeeList');
Route::post('admin/registerNewEmployee', 'AdminController@registerNewEmployee');
