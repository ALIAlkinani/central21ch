<?php

namespace App\Policies;

use App\User;
use App\Poem;
use Illuminate\Auth\Access\HandlesAuthorization;

class PoemPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the poem.
     *
     * @param  \App\User  $user
     * @param  \App\Poem  $poem
     * @return mixed
     */
    public function view(User $user, Poem $poem)
    {
        //
    }

    /**
     * Determine whether the user can create poems.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the poem.
     *
     * @param  \App\User  $user
     * @param  \App\Poem  $poem
     * @return mixed
     */
    public function update(User $user, Poem $poem)
    {
        return $poem->user_id === $user->id;
    }

    /**
     * Determine whether the user can delete the poem.
     *
     * @param  \App\User  $user
     * @param  \App\Poem  $poem
     * @return mixed
     */
    public function delete(User $user, Poem $poem)
    {
        //
    }
}
