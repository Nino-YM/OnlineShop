<?php

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

if (!function_exists('getCartCount')) {
    function getCartCount() {
        if (Auth::check()) {
            return Cart::where('user_id', auth()->id())->sum('quantity');
        } else {
            $cart = Session::get('cart', []);
            return array_sum(array_column($cart, 'quantity'));
        }
    }
}
