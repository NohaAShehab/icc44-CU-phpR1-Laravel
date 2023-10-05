<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Track extends Model
{
    use HasFactory;

    protected $fillable= ['name', 'description'];  # pass only these keywords to the create function
//    protected $guarded=['csrf_token'];  # don't pass this keyword

    function students(){

        return $this->hasMany(Student::class);
    }
    # return with students in this track
}
