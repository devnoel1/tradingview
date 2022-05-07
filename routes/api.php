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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', 'App\Http\Controllers\API\RegisterController@register');
Route::post('login', 'App\Http\Controllers\API\RegisterController@login');

Route::group(['prefix' => 'affiliate','middleware'=>'auth:sanctum','as'=>'affiliate.'], function () {
	Route::post('/save-lead','App\Http\Controllers\API\AffiliateCreateLeadController@saveAffiliateLead');
	Route::get('/leads','App\Http\Controllers\API\AffiliateCreateLeadController@getAffiliateLead');
	Route::get('/users','App\Http\Controllers\API\AffiliateCreateLeadController@getAffiliateUser');
	Route::get('/deposits','App\Http\Controllers\API\AffiliateCreateLeadController@getAffiliateDeposit');
});

