@extends('layouts.app')


@section('body')
<h1> Welcome to iti landing page </h1>

    <table class="table">
        <tr> <th> ID</th> <th>Name</th>
            <th> Show </th>
        </tr>

        @foreach($students as $student)
            <tr><td>{{$student['id']}}</td>
                <td>{{$student['name']}}</td>
                <td> <a href="/iti/students/{{$student['id']}}"  class="btn btn-info"> Show</a></td>
            </tr>

        @endforeach

    </table>
@endsection


@section('content')
    <h3> Welcome to blade template inheritance</h3>
@endsection
