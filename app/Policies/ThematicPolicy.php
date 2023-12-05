<?php

namespace App\Policies;

use App\Models\Thematic;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ThematicPolicy
{
    use HandlesAuthorization;

    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, Thematic $thematic): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return $user->roles->contains('name', 'admin');
    }

    public function update(User $user, Thematic $thematic): bool
    {
        return $user->roles->contains('name', 'admin');
    }

    public function delete(User $user, Thematic $thematic): bool
    {
        return $user->roles->contains('name', 'admin');
    }

    public function restore(User $user, Thematic $thematic): bool
    {
        return $user->roles->contains('name', 'admin');
    }

    public function forceDelete(User $user, Thematic $thematic): bool
    {
        return $user->roles->contains('name', 'admin');
    }
}
