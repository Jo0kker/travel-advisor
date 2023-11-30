<?php

namespace App\Policies;

use App\Models\country;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class countryPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {

    }

    public function view(User $user, country $country): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, country $country): bool
    {
    }

    public function delete(User $user, country $country): bool
    {
    }

    public function restore(User $user, country $country): bool
    {
    }

    public function forceDelete(User $user, country $country): bool
    {
    }
}
