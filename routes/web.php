<?php
use App\Http\Controllers\DojoController;
use App\Http\Controllers\UserController;

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

// Route::view('/', 'welcome');

Route::get('/', 'HomeController@index')->name('Home');

Route::get('/search', 'OwnershipController@search')->name('ownerships.search');

Route::get('/detail/{id}', 'OwnershipController@show')->name('detail');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/user/{id}/edit', 'UserController@edit')->name('users.edit');
    Route::put('/user/{id}', 'UserController@update')->name('users.update');
    Route::get('/promote', 'OwnershipController@index');
    Route::get('/dojo', 'OwnershipController@create')->name('ownerships.create');
    Route::post('/dojo', 'OwnershipController@store')->name('ownerships.store');
    Route::get('/dojo/{id}/edit', 'OwnershipController@edit')->name('ownerships.edit');
    Route::put('/dojo/{id}', 'OwnershipController@update')->name('ownerships.update');
    Route::delete('/dojo/{id}', 'OwnershipController@destroy')->name('ownerships.destroy');
});

Auth::routes();