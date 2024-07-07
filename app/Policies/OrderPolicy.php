<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Order;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
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

    public function view(User $user, Order $order)
    {
        return $user->id === $order->user_id;
    }

    public function create(User $user)
    {
        return $user->role_id === 2; 
    }

    public function update(User $user, Order $order)
    {
        return $user->id === $order->user_id;
    }

    public function delete(User $user, Order $order)
    {
        return $user->id === $order->user_id;
    }
}
