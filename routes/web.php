<?php
Route::get('/', function () {
    return view('welcome');
});

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
