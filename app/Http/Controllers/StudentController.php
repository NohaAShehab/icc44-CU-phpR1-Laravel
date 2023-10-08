<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Student;
use App\Models\Track;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;



class StudentController extends Controller
{
    //

    function __construct(){
        $this->middleware('auth')->only(['store', 'update', 'destroy']);
//        $this->middleware('auth')->except(['index', 'show']);
    }

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

        $tracks = Track::all();
        return view('students.create',['tracks'=>$tracks]);

    }

    function store()
    {

        # validate data in backend

        \request()->validate([

            "name"=>"required|min:5",
            "email"=>"required|unique:students"
        ],[
            "name.required"=>"Student name is required",
            'name.min'=>'Student name must be at least 5 chars.'
        ]);


        $requestdata = \request()->all();
        $requestdata['creator_id'] = Auth::id();

        $student=Student::create($requestdata);

        return to_route('students.show', $student->id);

    }






    # delete
    function destroy( $id)
    {
        $student = Student::findorfail($id);
        #### only admin can delete student using gates
//        if (! Gate::allows('is-admin')) {
////            dd("You are not allowed to delete student ");
//            abort(403);
//        }
//
//        $student->delete();
//        return to_route('students.index');

        ################# only admin can delete student using policy
//        $user= Auth::user();
////        dd(Gate::inspect("admin", $user));
//
//        $response= Gate::inspect('admin', $user);
////        dd($response->allowed());
//        if ($response->allowed()){
//            $student = Student::findorfail($id);
//            $student->delete();
//            return to_route('students.index');
//        }
//
//        return  abort(403);

        ################ admin or creator can delete post

        $response= Gate::inspect('destroy', $student);
//        dd($response);
        if ($response->allowed()){
            $student->delete();
            return to_route('students.index');
        }
        return  abort(403);


    }


    # edit

}
