<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ITIController extends Controller
{
    //
    private $students = [
        ["id"=>"1", "name"=>"Ahmed"],
        ["id"=>"2", "name"=>"Mohamed"],
        ["id"=>"3", "name"=>"Ali"]

    ];

    function studentsIndex(){


        return $this->students;
    }

    function show($id){
        foreach ($this->students as $student){
            if ($student['id']==$id){
                return $student;
            }
        }
        return abort('404');
    }


    function landing(){

        # send data to the php view
        return view('landing', ["students"=>$this->students]);
    }

    function landingblade(){
        return view('landingb', ["students"=>$this->students, 'name'=>'Noha']);
    }
}




