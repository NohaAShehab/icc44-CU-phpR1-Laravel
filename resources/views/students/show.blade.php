
@extends('layouts.app')

@section('content')
    <h1> Student Profile {{$student->name}} </h1>

    <div class="card " style="width: 18rem;">
        <img src="{{asset('images/iti/'.$student->image)}}"
             width="200" height="200"
             class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{$student->name}}</h5>
            <h5> Email: {{$student->email}} </h5>
            <h5> Grade: {{$student->grade}} </h5>
            <h5> Created at : {{$student->created_at}} </h5>
            <h5> Updated at: {{$student->updated_at}} </h5>
            <a href="{{route('students.index')}}" class="btn btn-primary">Back to all students </a>
        </div>
    </div>

@endsection
