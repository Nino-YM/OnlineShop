<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Address;
use Illuminate\Auth\Access\HandlesAuthorization;

class AddressPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if ($user->role_id === 2) {
            return true;
        }
    }

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Address $address)
    {
        return $user->id === $address->user_id;
    }

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, Address $address)
    {
        return $user->id === $address->user_id;
    }

    public function delete(User $user, Address $address)
    {
        return $user->id === $address->user_id;
    }
}
