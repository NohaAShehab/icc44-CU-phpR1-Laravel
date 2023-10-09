<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

use App\Http\Controllers\api\StudentController;
Route::apiResource('students', StudentController::class);

//
//GET|HEAD        api/students ............................ students.index › api\StudentController@index
//  POST            api/students ........................ students.store › api\StudentController@store
//  GET|HEAD        api/students/{student} ........................ students.show › api\StudentController@show
//  PUT|PATCH       api/students/{student} ........................ students.update › api\StudentController@update
//  DELETE          api/students/{student} .................... students.destroy › api\StudentController@destroy


use App\Http\Controllers\api\TrackController;

Route::apiResource('tracks', TrackController::class);
