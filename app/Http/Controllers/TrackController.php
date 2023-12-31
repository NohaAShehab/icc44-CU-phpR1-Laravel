<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTrackRequest;
use App\Http\Requests\UpdateTrackRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
class TrackController extends Controller
{

    function __construct(){
//        $this->middleware(['auth'])->only(['store', 'update', 'destroy']);
        $this->middleware(['iti'])->only('store');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tracks = Track::all();
//        return $tracks;
        return view('tracks.index', ['tracks'=>$tracks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('tracks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTrackRequest $request)
    {

//        dd("this is the next");
        $request_data = $request->all();
        if($request->hasFile("logo")){
            $logo= $request_data["logo"];
            $path = $logo->store("uploadedfile",'track_uploads' );
            $request_data["logo"]= $path;
        }

        Track::create($request_data);

        return to_route('tracks.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Track $track)
    {
        //
//        dd($track);
        return view('tracks.show', ['track'=>$track]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Track $track)
    {
        //

        return view('tracks.edit', ['track'=>$track]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTrackRequest $request, Track $track)
    {

        $allowed = Gate::inspect('update', $track);

        if ($allowed->allowed()){
            $track->update($request->all());
            return to_route('tracks.show', $track->id);
        }

        return  abort(403);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Track $track)
    {
        if($track->logo){
            try {
                unlink("images/track_logo/{$track->logo}");
            }catch (\Exception $e){
                dd($e);
            }
        }
        $track->delete();
        return to_route('tracks.index');

    }
}
