<?php

namespace App\Policies;

use App\User;
use App\Translate;
use Illuminate\Auth\Access\HandlesAuthorization;

class TranslatePolicy
{
    use HandlesAuthorization;

    public function update(User $user, Translate $translate){

        return $translate->user_id==$user->id;

    }
    

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
}
