
@extends('layouts.app')

@section('content')

    <h1> Create New Student</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post"  action="{{route('students.store')}}">
        @csrf
        <div class="mb-3">
            <label  class="form-label">Name</label>
            <input type="text" class="form-control" name="name"  value="{{ old('name') }}"  >
            @error('name')
                <div style="color: red; font-weight: bold"> {{$message}}</div>
            @enderror

        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1"
                   value="{{ old('email') }}"
                   name="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            @error('email')
            <div style="color: red; font-weight: bold"> {{$message}}</div>
            @enderror
        </div>


        <div class="mb-3">
            <label  class="form-label">Image</label>
            <input type="text" name="image"  value="{{ old('image') }}" class="form-control" >
        </div>
        <div class="mb-3">
            <label  class="form-label">Grade</label>
            <input type="number" name="grade" class="form-control"
                   value="{{ old('grade') }}"
                   aria-describedby="emailHelp">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
