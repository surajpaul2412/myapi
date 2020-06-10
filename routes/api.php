<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\InfoResources;
use App\Info;

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


Route::get('infos', 'Api\InfoController@index');
Route::get('info/{id}', 'Api\InfoController@show');
Route::post('info', 'Api\InfoController@store');
Route::put('info', 'Api\InfoController@store');
Route::delete('info/{id}', 'Api\InfoController@destroy');