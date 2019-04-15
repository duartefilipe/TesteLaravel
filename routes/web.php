<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/events', 'EventController@index');
Route::post('/update/{id}', 'HomeController@update');
Route::get('/delete/{id}', 'HomeController@delete');
Route::get('/edit/{id}', 'HomeController@edit');

