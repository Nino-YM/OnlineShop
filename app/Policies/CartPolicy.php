<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Cart;
use Illuminate\Auth\Access\HandlesAuthorization;

class CartPolicy
{
    use HandlesAuthorization;

    public function before(?User $user)
    {
        return true;
    }

    public function viewAny(?User $user)
    {
        return true;
    }

    public function view(?User $user, Cart $cart)
    {
        return true;
    }

    public function create(?User $user)
    {
        return true;
    }

    public function update(?User $user, Cart $cart)
    {
        return true;
    }

    public function delete(?User $user, Cart $cart)
    {
        return true;
    }
}
