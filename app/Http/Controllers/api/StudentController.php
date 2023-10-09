<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Couchbase\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Http\Resources\StudentResource;
use Ramsey\Collection\Collection;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $students= Student::all();  # array of objects
//        return $students;
        return StudentResource::collection($students);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

//        dd($request->all());
        $validator = Validator::make($request->all(), [
            "name"=>"required",
            "email"=>"unique:students"
        ]);

        if($validator->fails()){
            return response($validator->errors()->all(), 422);
        }


        $student = Student::create($request->all());
//        return response($student, 201);
//        return response()->json(new StudentResource($student), 201);
        return (new StudentResource($student))->response()->setStatusCode(201);

        # how to return with res
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
//        return $student;
        return new StudentResource($student);
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

        $student_resource=  new StudentResource($student);
//        return response($student_resource, 200);
        return  new StudentResource($student);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //

        $student->delete();
//        return 'deleted';
        return response("Deleted", 204);

    }
}
