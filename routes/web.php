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
    Route::get('/home', 'HomeController@index');
});

Route::get('counter', function () {
    return view('counter');
});
Route::get('todos', function () {
    return view('todos');
});
