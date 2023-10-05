
@extends('layouts.app')

@section('content')
    <h1> Track Profile {{$track->name}} </h1>

    <div class="card " style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{$track->name}}</h5>
            <h5> Description: {{$track->description}} </h5>
            <h5> Created at : {{$track->created_at}} </h5>
            <h5> Updated at: {{$track->updated_at}} </h5>
            <a href="{{route('tracks.index')}}" class="btn btn-primary">Back to all Tracks </a>
        </div>
    </div>
    <h1> Students in this Track </h1>

{{--    @dump($track->students)--}}
    <ol>
        @foreach($track->students as $std)
            <li> <a href="{{route('students.show', $std->id)}}"> {{$std->name}}</a></li>

        @endforeach

    </ol>
@endsection
