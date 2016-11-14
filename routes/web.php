<?php
Route::get('/', function () {
    return view('welcome');
});

// confirm registration
Route::get('please-confirm', function () {
    return view('please-confirm');
});
Route::get('confirm-registration/{token}', 'ConfirmRegistration@index');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('home', 'HomeController@index');
});



