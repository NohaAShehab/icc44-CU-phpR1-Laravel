
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

@endsection
