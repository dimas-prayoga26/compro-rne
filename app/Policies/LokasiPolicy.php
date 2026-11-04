<?php

namespace App\Policies;

use App\Models\Lokasi;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class LokasiPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Lokasi $lokasi): bool
    {
        return $user->id === Auth::id();
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->id === Auth::id();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Lokasi $lokasi): bool
    {
        return $user->id === Auth::id();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Lokasi $lokasi): bool
    {
        return $user->id === Auth::id();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Lokasi $lokasi): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Lokasi $lokasi): bool
    {
        return false;
    }
}
