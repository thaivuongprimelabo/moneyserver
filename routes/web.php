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
    if (Auth::check()) {
        return view('welcome');
    } else {
        return redirect('/auth/login');
    }
});

Auth::routes();

Route::get('/login', function() {
    return redirect('/auth/login');
})->name('login');;

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'auth', 'namespace' => 'Admin'], function () {
    Route::get('/', array('uses' => 'LoginController@index'));
    Route::get('/login', array('uses' => 'LoginController@login'));
    Route::post('/logout', array('uses' => 'LoginController@logout'));
    Route::post('/checklogin', array('uses' => 'LoginController@checkLogin'));
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');

    #Types
    Route::group(['prefix' => 'types'], function () {
        Route::get('/', 'BackendController@types')->name('types.get');
        Route::post('/', 'BackendController@types')->name('types.post');
        
        Route::get('/add', 'BackendController@submitType')->name('types.add.get');
        Route::post('/add', 'BackendController@submitType')->name('types.add.post');
        
        Route::get('/edit/{value}', 'BackendController@submitType')->name('types.edit.get');
        Route::post('/edit/{value}', 'BackendController@submitType')->name('types.edit.post');
    });
    
    #Actions
    Route::group(['prefix' => 'actions'], function () {
        Route::get('/', 'BackendController@actions')->name('actions.get');
        Route::post('/', 'BackendController@actions')->name('actions.post');
        
        Route::get('/add', 'BackendController@submitAction')->name('actions.add.get');
        Route::post('/add', 'BackendController@submitAction')->name('actions.add.post');
        
        Route::get('/edit/{id}', 'BackendController@submitAction')->name('actions.edit.get');
        Route::post('/edit/{id}', 'BackendController@submitAction')->name('actions.edit.post');
    });
    
    #Locations
    Route::group(['prefix' => 'locations'], function () {
        Route::get('/', 'BackendController@locations')->name('locations.get');
        Route::post('/', 'BackendController@locations')->name('locations.post');
        
        Route::get('/add', 'BackendController@submitLocation')->name('locations.add.get');
        Route::post('/add', 'BackendController@submitLocation')->name('locations.add.post');
        
        Route::get('/edit/{id}', 'BackendController@submitLocation')->name('locations.edit.get');
        Route::post('/edit/{id}', 'BackendController@submitLocation')->name('locations.edit.post');
    });
    
    #Twilio
    Route::group(['prefix' => 'twilio'], function () {
        Route::get('/', 'BackendController@twilio')->name('twilio.get');
        Route::post('/', 'BackendController@twilio')->name('twilio.post');
        
    });

});
