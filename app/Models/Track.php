<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    use HasFactory;

    protected $fillable= ['name', 'description'];  # pass only these keywords to the create function
//    protected $guarded=['csrf_token'];  # don't pass this keyword
}
