<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//read
Route::get('irregualr_verb', 'Api\VerbsController@index');
Route::get('irregualr_verb/{v1}', 'Api\VerbsController@show');

//create
Route::post('irregualr_verb', 'Api\VerbsController@store');

//update
Route::post('irregualr_verb/{v1}', 'Api\VerbsController@update');

//delete
Route::delete('irregualr_verb/{v1}', 'Api\VerbsController@destroy');