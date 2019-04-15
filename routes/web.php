<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/events', 'EventController@index');

Route::get('/delete/{id}', 'HomeController@delete');
