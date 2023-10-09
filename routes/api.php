<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

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


######## Authenticate apis

Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();
    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }
    return $user->createToken($request->device_name)->plainTextToken;
});




Route::post("/logout", function (Request $request){
    # 1- get user based on token
    $user = Auth::guard('sanctum')->user();
    $token =$user->currentAccessToken();
    $token->delete();

    return response("Logged_out", 200);
});
