<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Favorite;
use Illuminate\Auth\Access\HandlesAuthorization;

class FavoritePolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if ($user->role_id === 1) {
            return true;
        }
    }

    public function viewAny(User $user)
    {
        return $user->role_id === 2; 
    }

    public function view(User $user, Favorite $favorite)
    {
        return $user->id === $favorite->user_id;
    }

    public function create(User $user)
    {
        return $user->role_id === 2; 
    }

    public function delete(User $user, Favorite $favorite)
    {
        return $user->id === $favorite->user_id;
    }
}
