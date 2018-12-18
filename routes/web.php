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

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/lead', 'LeadController@page')->name('lead.page');
Route::post('/lead', 'LeadController@store')->name('lead.store');

Route::group(['prefix' => '/session'], function () {
    Route::get('register', 'SessionController@register')->name('session.register');
    Route::post('register', 'SessionController@store')->name('session.store');

    Route::get('login', 'SessionController@login')->name('session.login');
    Route::post('authenticate', 'SessionController@authenticate')->name('session.authenticate');

    Route::post('logout', 'SessionController@logout')->name('session.logout');
});

Route::group(['prefix' => '/admin'], function () {
	Route::resource('leads', 'AdminLeadController')->only([
        'index',
        'show',
    ]);

    // Yes a GET for this is very bad. I'll fix later if I have time.
    // If you see this it means I didn't have time.
    Route::get('leads/{id}/delete', 'AdminLeadController@destroy')->name('leads.destroy');
});