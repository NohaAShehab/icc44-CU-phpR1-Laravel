<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Couchbase\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
//use Illuminate\Http\Response;
use Illuminate\Validation\Rule;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $students= Student::all();
        return $students;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            "email"=>"unique:students"
        ]);

        if($validator->fails()){
            return response($validator->errors()->all(), 422);
        }


        $student = Student::create($request->all());
        return response($student, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
        return $student;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
        $validator = Validator::make($request->all(), [
            "email"=>[  Rule::unique('students')->ignore($student->email)]
        ]);

        if($validator->fails()){
            return response($validator->errors()->all(), 422);
        }


        $student->update($request->all());
        return response($student, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //

        $student->delete();
        return 'deleted';

    }
}
