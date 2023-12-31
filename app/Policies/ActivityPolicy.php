<?php

namespace App\Policies;

use App\Models\Activity;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ActivityPolicy
{
    use HandlesAuthorization;

    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, Activity $activity): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return $user->roles->contains('name', 'admin');
    }

    public function update(User $user, Activity $activity): bool
    {
        return $user->roles->contains('name', 'admin');
    }

    public function delete(User $user, Activity $activity): bool
    {
        return $user->roles->contains('name', 'admin');
    }

    public function restore(User $user, Activity $activity): bool
    {
        return $user->roles->contains('name', 'admin');
    }

    public function forceDelete(User $user, Activity $activity): bool
    {
        return $user->roles->contains('name', 'admin');
    }
}
