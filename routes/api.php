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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('students','Api\StudentController@index');
Route::get('students/{student_id}','Api\StudentController@show');
Route::delete('students/{student}','Api\StudentController@destroy');

Route::get('applications','Api\ApplicationController@index');
Route::get('applications/{application_id}','Api\ApplicationController@show');
Route::get("departments","Api\DepartmentController@index");
