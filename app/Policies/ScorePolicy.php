<?php

namespace App\Policies;

use App\Models\Score;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ScorePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Score $score)
    {
        return $user->id == $score->user_id || 1;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Score $score)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Score $score)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Score $score)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Score $score)
    {
        return true;
    }
}
