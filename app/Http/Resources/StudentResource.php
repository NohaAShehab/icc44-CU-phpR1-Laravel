<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

use App\Http\Resources;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
//        dd($request, $this);
//        return parent::toArray($request);
//        dd($this);
        return [
            "id"=>$this->id,
          "name"=>$this->name,
          "studentname"=>$this->name,
          "grade"=>$this->grade,
            "email" => $this->email,
            "owner"=> $this->creator_id,
            'trackname'=>$this->track ? $this->track->name: null,
//            "track_id"=>$this->track,  # full track object
//            "track_resource"=> new TrackResource($this->track)

        ];

    }
}
