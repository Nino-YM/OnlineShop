<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Promotion;
use Illuminate\Auth\Access\HandlesAuthorization;

class PromotionPolicy
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
        return true;
    }

    public function view(User $user, Promotion $promotion)
    {
        return true;
    }

    public function create(User $user)
    {
        return $user->role_id === 1; 
    }
    public function update(User $user, Promotion $promotion)
    {
        return $user->role_id === 1;
    }

    public function delete(User $user, Promotion $promotion)
    {
        return $user->role_id === 1;
    }
}
