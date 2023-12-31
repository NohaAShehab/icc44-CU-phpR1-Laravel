<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ITIController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TrackController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('iti', function(){

    return "Hello World";
});



// Route::get('students', function(){
//     $students = [
//         "Mohamed", 'Moataz', 'Ahmed', 'Ali', 'Amany'
//     ];
//     return $students;
// });





# send id as a paramter to the url ?
# {} ==> this a mandatory changable part in the url
//Route::get('students/{id}', function($id){
//    $students = [
//        ["id"=>"1", "name"=>"Ahmed"],
//        ["id"=>"2", "name"=>"Mohamed"],
//        ["id"=>"3", "name"=>"Ali"]
//
//    ];
//
//    foreach ($students as $std){
//            if ($std["id"]==$id){
//                return $std;
//            }
//    }
//    return abort(404);
//});


### I need to list routes in my laravel application
# php artisan route:list

# I need to create controller ==> each route is associated with controller function

# to create controller
# use php artisan make:controller StudentController




Route::get('iti/students',[ITIController::class, 'studentsIndex'] );


Route::get('iti/students/{id}', [ITIController::class, 'show'])->name('iti.show');

Route::get("iti/land", [ITIController::class, 'landing']);

Route::get('iti/landing',[ITIController::class, 'landingblade']);

###########################  StudentController  get data from database

Route::get('db/students', [StudentController::class,'index_db'])->name('students.db');

Route::get('students', [StudentController::class, 'index'])->name('students.index');  # name routes
Route::get('students/create', [StudentController::class, 'create'])->name('students.create');
Route::get('students/{id}',[StudentController::class, 'show'])->name('students.show');
Route::get('students/{id}/delete', [StudentController::class, 'destroy'])->name('students.destroy');
//Route::post('students', [StudentController::class, 'store'])
//    ->name('students.store')->middleware('auth');
Route::post('students', [StudentController::class, 'store'])
    ->name('students.store');
#################################################3
#### generate Track routes in one line using resource Controller
//Route::resource('tracks', TrackController::class);
//Route::middleware(['auth'])->group(function (){
    Route::resource('tracks', TrackController::class);
//})->only(['store', 'update','destroy']);
############################################### Auth
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


################ Api
# php artisan make:controller api/StudentController


########## login with github
use Laravel\Socialite\Facades\Socialite;

Route::get('/auth/redirect', function () {
//    dd("Hi github");
    return Socialite::driver('github')->redirect();
});

Route::get('/auth/callback', function () {
    $githubUser = Socialite::driver('github')->stateless()->user();

    $user = User::where("email", $githubUser->email)->first();
//    dd($user);
//    dd($userfound);
    if(! $user){

            $user = User::updateOrCreate([
            'github_id' => $githubUser->id,
        ], [
            'name' => $githubUser->name,
            'email' => $githubUser->email,
            'password'=> null,
            'github_token' => $githubUser->token,
            'github_refresh_token' => $githubUser->refreshToken,
        ]);
    }


    Auth::login($user);

    return redirect('/students');
});



