
@extends('layouts.app')

@section('content')
    <a href="{{route('tracks.create')}}" class="btn btn-success">Add new Track </a>
    <h1> All Tracks from the database </h1>
    <table class="table">
        <thead>
            <tr> <th> Id</th> <th> Name </th> <th>Show</th> <th> Edit </th> <th> Delete</th></tr>
        </thead>
        <tbody>
            @foreach($tracks as $track)
                <tr>
                    <td> {{$track->id}}</td>
                    <td> {{$track->name}}</td>
                    <td> <a href="{{route('tracks.show', $track->id)}}" class="btn btn-info"> Show </a></td>
                    <td> <a href="{{route('tracks.edit', $track->id)}}" class="btn btn-warning"> Edit </a></td>
                    <td>
                        <form action="{{route('tracks.destroy', $track->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit"   class="btn btn-danger" value="Delete">
                        </form>
                    </td>
                </tr>


            @endforeach

        </tbody>

    </table>
@endsection
