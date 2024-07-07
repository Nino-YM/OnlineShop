<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Review;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReviewPolicy
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

    public function view(User $user, Review $review)
    {
        return true;
    }

    public function create(User $user)
    {
        return $user->role_id === 2  || $user->role_id === 1; 
    }

    public function update(User $user, Review $review)
    {
        return $user->role_id === 1; 
    }

    public function delete(User $user, Review $review)
    {
        return $user->role_id === 1; 
    }
}
