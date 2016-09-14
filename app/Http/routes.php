<?php


Route::get('/', 'PagesController@index');
Route::get('home', 'PagesController@index');

Route::get('logout', function(){
	Auth::logout();
});
Route::auth();

Route::get('admin', 'PagesController@admin');
Route::get('index', 'PagesController@index');
Route::get('reception', 'PagesController@reception');
Route::get('consultation', 'PagesController@consultation');

Route::get('reception/getregistration', 'ReceptionController@getRegistration');
Route::post('reception/verifyclient', 'ReceptionController@verifyClient');
Route::post('reception/newclient', 'ReceptionController@newClient');
Route::post('reception/getclients', 'ReceptionController@getClients');
Route::post("reception/update", 'ReceptionController@regUpdate');
Route::post('reception/getpatients', 'ReceptionController@getPatients');

Route::get('registration', 'RegistrationController@registration');
Route::get('registration.success', 'RegistrationController@registrationSuccess');
Route::get('registration.newclient', 'RegistrationController@registrationNewClientForm');
Route::get('registration/editedreg', 'RegistrationController@getEditedReg');

Route::post('registration/newclient', 'RegistrationController@registerNewClient');
Route::post('registration/registerinqueue', 'RegistrationController@registerInQueue');
