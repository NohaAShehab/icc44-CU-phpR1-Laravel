<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Student;

class StudentController extends Controller
{
    //

    function  index(){
        # this function select * from students table;
        /**
            geT DATA using eloquent models
         */
        $students = Student::all();  # Eloquent orm
//        return $students;
        return view('students.index', ['students'=>$students]);
    }

    function  index_db(){

        $students=  DB::table('students')->get();
//        return $students;
        return view('students.index', ['students'=>$students]);
    }


    function show($id){
//        $student = Student::find($id);
        $student = Student::findorfail($id);
//        dd($student);  # dump + exit --> stop execution after displaying content
        return view('students.show', ["student"=>$student]);
    }


    # create

    function  create(){
        return view('students.create');

    }

    function store()
    {
//        dd('data received');
//        dd($_POST);

        # laravel introduce request function
        $data = \request();  # returns with request object- --> holding the data
        $name = \request()->get('name');
        $email = \request()->get('email');
        $grade = \request()->get('grade');
        $image = \request()->get('image');

        $student = new Student();
        $student->name= $name;
        $student->email = $email;
        $student->image= $image;
        $student->grade = $grade;
        $student->save();

//        dd($student->id);
//        return to_route('students.index');
        return to_route('students.show', $student->id);

    }






    # delete
    function destroy( $id)
    {
        $student = Student::findorfail($id);
        $student->delete();
//        return 'deleted';
        return to_route('students.index');
    }


    # edit

}
