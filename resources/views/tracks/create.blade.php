
@extends('layouts.app')

@section('content')

    <h1> Create New Track</h1>

    <form method="post"  action="{{route('tracks.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label  class="form-label">Name</label>
            <input type="text" class="form-control" name="name"  value="{{ old('name') }}"  >
            @error('name')
                <div style="color: red; font-weight: bold"> {{$message}}</div>
            @enderror

        </div>


        <div class="mb-3">
            <label  class="form-label">Description</label>
            <input type="text" name="description"  value="{{ old('description') }}" class="form-control" >
        </div>

        <div class="mb-3">
            <label  class="form-label">Logo</label>
            <input type="file" name="logo"  class="form-control" >
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
