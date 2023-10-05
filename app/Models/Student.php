<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Track;

class Student extends Model
{
    # Student model in laravel --> application connect this model with table named = students
    use HasFactory;

    ## define relation between  track model and student model

    function track(){
        return $this->belongsTo(Track::class);
    } # return with track object
}
