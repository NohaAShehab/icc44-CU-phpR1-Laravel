
@extends('layouts.app')

@section('content')
    <a href="{{route('students.create')}}" class="btn btn-success">Add new Student </a>
    <h1> All students from the database </h1>
{{--    @dump($students)--}}
    <div class="row">
{{--          this a comment  ---> elquent orm --> returns data in form of object but laravel allows you to use it as an array--}}
        @foreach($students as $student)
            <div class="col-lg-4">
                <div class="card " style="width: 18rem;">
                    <img src="{{asset('images/iti/'.$student->image)}}"
                         width="200" height="200"
                         class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$student->name}}</h5>
                        <a href="{{route('students.show', $student->id)}}" class="btn btn-primary">Show</a>
                        <a href="{{route('students.destroy', $student->id)}}" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection
