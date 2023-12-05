<?php

namespace App\Policies;

use App\Models\Season;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SeasonPolicy
{
    use HandlesAuthorization;

    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, Season $season): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return $user->roles->contains('name', 'admin');
    }

    public function update(User $user, Season $season): bool
    {
        return $user->roles->contains('name', 'admin');
    }

    public function delete(User $user, Season $season): bool
    {
        return $user->roles->contains('name', 'admin');
    }

    public function restore(User $user, Season $season): bool
    {
        return $user->roles->contains('name', 'admin');
    }

    public function forceDelete(User $user, Season $season): bool
    {
        return $user->roles->contains('name', 'admin');
    }
}
