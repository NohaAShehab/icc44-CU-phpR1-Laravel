<?php

namespace App\Policies;
use Illuminate\Auth\Access\Response;

use App\Models\User;
use App\Models\Student;

class StudentPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function destroy(User $user, Student $student): bool
    {
        return $user->id === $student->creator_id;
    }
}
