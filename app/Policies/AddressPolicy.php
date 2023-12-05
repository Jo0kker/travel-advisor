<?php

namespace App\Policies;

use App\Models\Address;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AddressPolicy
{
    use HandlesAuthorization;

    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, Address $address): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return $user->roles->contains('name', 'admin');
    }

    public function update(User $user, Address $address): bool
    {
        return $user->roles->contains('name', 'admin');
    }

    public function delete(User $user, Address $address): bool
    {
        return $user->roles->contains('name', 'admin');
    }

    public function restore(User $user, Address $address): bool
    {
        return $user->roles->contains('name', 'admin');
    }

    public function forceDelete(User $user, Address $address): bool
    {
        return $user->roles->contains('name', 'admin');
    }
}
