<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Deyaa section:

Route::get('/homecompany', 'CompanyController@index')->name('homeCompany');
Route::get('/homecompany/create', 'CompanyController@create')->name('create');
Route::post('/homecompany/createcar', 'CompanyController@createcar')->name('create.car');
Route::get('/companyrequests', 'CompanyController@requests')->name('company.requests');
Route::put('/acceptrequest', 'CompanyController@acceptrequest')->name('company.accept.request');
Route::get('/companyprofile', 'CompanyController@profile')->name('company.profile');


Route::get('/homerenter', 'RenterController@index')->name('homeRenter');
Route::get('/booking/{id}', 'RenterController@booking')->name('booking');
Route::post('/bookingDetails', 'RenterController@bookingDetails')->name('booking.details');
Route::get('/renterprofile', 'RenterController@profile')->name('company.profile');
Route::get('/detail/{id}', 'RenterController@detail')->name('detail');



// -----
Route::resource('posts','CarController');


Route::get('/sort', 'CarController@sort')->name('sort');

// -----

