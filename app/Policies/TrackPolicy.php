<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Track;

class TrackPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    function update(User $user, Track $track){

        return $user->can('is-admin');

    }


}
