<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();
        } else {
            $cartItems = Session::get('cart', []);
        }

        return view('cart.index', compact('cartItems'));
    }

    public function store(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        if (Auth::check()) {
            $cartItem = Cart::firstOrCreate(
                ['user_id' => auth()->id(), 'product_id' => $product->id],
                ['quantity' => $request->input('quantity', 1)]
            );
        } else {
            $cart = Session::get('cart', []);
            $cart[] = ['product_id' => $product->id, 'quantity' => $request->input('quantity', 1)];
            Session::put('cart', $cart);
        }

        return redirect()->route('cart.index');
    }

    public function destroy($productId)
    {
        if (Auth::check()) {
            $cartItem = Cart::where('user_id', auth()->id())->where('product_id', $productId)->first();
            if ($cartItem) {
                $cartItem->delete();
            }
        } else {
            $cart = Session::get('cart', []);
            $cart = array_filter($cart, function ($item) use ($productId) {
                return $item['product_id'] != $productId;
            });
            Session::put('cart', $cart);
        }

        return redirect()->route('cart.index');
    }
}
