<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    # Student model in laravel --> application connect this model with table named = students
    use HasFactory;
//    protected $table = 'tablename';  # to connect this with table with the given tablename.

}
