<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->role_id === 1;
    }

    public function view(User $user, Role $role)
    {
        return $user->role_id === 1;
    }

    public function create(User $user)
    {
        return $user->role_id === 1;
    }

    public function update(User $user, Role $role)
    {
        return $user->role_id === 1;
    }

    public function delete(User $user, Role $role)
    {
        return $user->role_id === 1;
    }
}
