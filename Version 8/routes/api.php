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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("sign", "PersonController@sign");
Route::post("login", "PersonController@login");
Route::get("getCustomers", "PersonController@getCustomers");
Route::post("addContacts", "PersonController@addContacts"); 
Route::get("get/{id}", "PersonController@getUser");
Route::post("edit", "PersonController@edit");
Route::get("delete/{id}", "PersonController@delete");
Route::get("viewAll","PersonController@view");
Route::post("search", "PersonController@search");