@extends('layouts.app')


@section('alaa')
<h1> Welcome to iti landing page </h1>

        <div class="row">
        @foreach($students as $student)
            <div class="col-lg-4">
            <div class="card " style="width: 18rem;">
                <img src="{{asset('images/iti/'.$student['image'])}}"
                     width="200" height="200"
                     class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$student["name"]}}</h5>
                    <a href="{{route('iti.show', $student['id'])}}" class="btn btn-primary">Show</a>
                </div>
            </div>
            </div>
        @endforeach

        </div>

@endsection


@section('content')
    <h3> Welcome to blade template inheritance</h3>
@endsection
