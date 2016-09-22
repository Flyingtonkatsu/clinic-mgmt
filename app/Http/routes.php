<?php


Route::get('/', 'PagesController@index');
Route::get('home', 'PagesController@index');

Route::get('logout', function(){
	Auth::logout();
});
Route::auth();

Route::get('index', 'PagesController@index');
Route::get('reception', 'PagesController@reception');
Route::get('consultation', 'PagesController@consultation');
Route::get('registration', 'PagesController@registration');
Route::get('admin', 'PagesController@admin');

Route::get('admin/employee#registration', 'AdminController@getFormEmployeeRegistration');
Route::get('admin/employee#view', 'AdminController@getEmployeeList');

Route::get('reception/viewRegTable', 'ReceptionController@getViewRegTable');
Route::get('reception/getregistration', 'ReceptionController@getRegistrationsToday');
Route::post('reception/verifyclient', 'ReceptionController@verifyClient');
Route::post('reception/newclient', 'ReceptionController@newClient');
Route::post('reception/getclients', 'ReceptionController@getClients');
Route::post("reception/update", 'ReceptionController@regUpdate');
Route::post('reception/getpatients', 'ReceptionController@getPatients');
Route::post('reception/getnewpatientform', 'ReceptionController@getNewPatientForm');
Route::post("reception/getbreeds", 'ReceptionController@getBreeds');
Route::post("reception/addnewclient", 'ReceptionController@newPatient');
Route::post('reception/verifyexistingpatient', 'ReceptionController@verifyPatient');

Route::get('registration/viewNewClient', 'RegistrationController@getViewNewClient');
Route::get('registration/viewQueue', 'RegistrationController@getViewQueue');
Route::get('registration/editedreg', 'RegistrationController@getEditedReg');

Route::post('registration/newclient', 'RegistrationController@registerNewClient');
Route::post('registration/registerinqueue', 'RegistrationController@registerInQueue');
