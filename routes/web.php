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

// Route::get('/', function () {
//     return view('layouts.layout_userContact');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'contactController@show');
Route::post('/get/contacts','contactController@getContacts');
Route::post('/get/contacts/search','contactController@getContactsSearch');

Route::post('/contact/store', 'adminController@store');
Route::post('/contact/update', 'adminController@update');
Route::post('/contact/delete', 'adminController@delete');
