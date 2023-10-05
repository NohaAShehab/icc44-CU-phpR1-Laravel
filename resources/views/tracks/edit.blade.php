
@extends('layouts.app')

@section('content')

    <h1> Edit Track</h1>

    <form method="post"  action="{{route('tracks.update', $track->id)}}">
        @csrf
        @method('put')
        <div class="mb-3">
            <label  class="form-label">Name</label>
            <input type="text" class="form-control" name="name"  value="{{old('name')  ?? $track->name}}"  >
            @error('name')
                <div style="color: red; font-weight: bold"> {{$message}}</div>
            @enderror

        </div>


        <div class="mb-3">
            <label  class="form-label">Description</label>
            <input type="text" name="description"  value="{{$track->description}}" class="form-control" >
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
