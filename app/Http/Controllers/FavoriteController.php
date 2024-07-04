<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $favorites = Favorite::with('product')->where('user_id', auth()->id())->get();
        return view('favorites.index', compact('favorites'));
    }

    public function store(Request $request)
    {
        Favorite::create($request->all());
        return redirect()->route('favorites.index');
    }

    public function destroy(Favorite $favorite)
    {
        $favorite->delete();
        return redirect()->route('favorites.index')->with('success', 'Favorite removed successfully.');
    }
}
