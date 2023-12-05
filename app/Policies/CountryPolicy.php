<?php

namespace App\Policies;

use App\Models\country;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CountryPolicy
{
    use HandlesAuthorization;

    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, country $country): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return $user->roles->contains('name', 'admin');
    }

    public function update(User $user, country $country): bool
    {
        return $user->roles->contains('name', 'admin');
    }

    public function delete(User $user, country $country): bool
    {
        return $user->roles->contains('name', 'admin');
    }

    public function restore(User $user, country $country): bool
    {
        return $user->roles->contains('name', 'admin');
    }

    public function forceDelete(User $user, country $country): bool
    {
        return $user->roles->contains('name', 'admin');
    }
}
