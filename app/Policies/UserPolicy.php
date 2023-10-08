<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    function  admin(User $user): bool
    {
        $user = Auth::user();
//        dump($user->role);
        return $user->role ==='admin';
    }
}
