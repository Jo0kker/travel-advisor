<?php

namespace App\Policies;

use App\Models\City;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CityPolicy
{
    use HandlesAuthorization;

    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, City $city): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return $user->roles->contains('name', 'admin');
    }

    public function update(User $user, City $city): bool
    {
        return $user->roles->contains('name', 'admin');
    }

    public function delete(User $user, City $city): bool
    {
        return $user->roles->contains('name', 'admin');
    }

    public function restore(User $user, City $city): bool
    {
        return $user->roles->contains('name', 'admin');
    }

    public function forceDelete(User $user, City $city): bool
    {
        return $user->roles->contains('name', 'admin');
    }
}
