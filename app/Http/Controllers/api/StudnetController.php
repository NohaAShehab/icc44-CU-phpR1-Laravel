<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class StudnetController extends Controller
{
    //

    function  index(){
        $students= Student::all();

        # laravel --> serialize models objects to json objects
        return $students;
    }

    function show(Student $student){
        return $student;
    }
}
