<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {
    Route::post('/auth', 'ApiController@authentication')->name('authentication.post');
    Route::post('/backup', 'ApiController@backup')->name('backup.post');
    Route::get('/settings', 'ApiController@settings')->name('settings.get');
    Route::get('/sync', 'ApiController@sync')->name('sync.get');
    Route::post('/add-location', 'ApiController@addLocation')->name('addlocation.post');
    Route::post('/call', 'ApiController@call')->name('call.post');
});