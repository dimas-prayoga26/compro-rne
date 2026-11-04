<?php

namespace App\Policies;

use App\Models\Detail;
use App\Models\User;

class ProfilePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->id === $user->detail->user_id;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Detail $detail): bool
    {
        return $user->id === $detail->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Detail $profile): bool
    {
        return $user->id === $profile->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Detail $detail): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Detail $detail): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Detail $detail): bool
    {
        return false;
    }
}
