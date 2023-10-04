<?php

use Illuminate\Support\Facades\Route;

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



Route::get('students', function(){
    $students = [
        ["id"=>"1", "name"=>"Ahmed"],
        ["id"=>"2", "name"=>"Mohamed"],
        ["id"=>"3", "name"=>"Ali"]

    ];
    return $students;
});


# send id as a paramter to the url ?
# {} ==> this a mandatory changable part in the url
Route::get('students/{id}', function($id){
    $students = [
        ["id"=>"1", "name"=>"Ahmed"],
        ["id"=>"2", "name"=>"Mohamed"],
        ["id"=>"3", "name"=>"Ali"]

    ];

    foreach ($students as $std){
            if ($std["id"]==$id){
                return $std;
            }
    }
    return abort(404);
});


### I need to list routes in my laravel application
# php artisan route:list

# I need to create controller ==> each route is associated with controller function

# to create controller
# use php artisan make:controller StudentController



use App\Http\Controllers\ITIController;
Route::get('iti/students',[ITIController::class, 'studentsIndex'] );


Route::get('iti/students/{id}', [ITIController::class, 'show'])->name('iti.show');

Route::get("iti/land", [ITIController::class, 'landing']);

Route::get('iti/landing',[ITIController::class, 'landingblade']);

###########################




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
