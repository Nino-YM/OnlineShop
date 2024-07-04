<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = Favorite::with('product')->get();
        return view('favorites.index', compact('favorites'));
    }

    public function create()
    {
        return view('favorites.create');
    }

    public function store(Request $request)
    {
        Favorite::create($request->all());
        return redirect()->route('favorites.index');
    }

    public function show(Favorite $favorite)
    {
        return view('favorites.show', compact('favorite'));
    }

    public function edit(Favorite $favorite)
    {
        return view('favorites.edit', compact('favorite'));
    }

    public function update(Request $request, Favorite $favorite)
    {
        $favorite->update($request->all());
        return redirect()->route('favorites.index');
    }

    public function destroy(Favorite $favorite)
    {
        $favorite->delete();
        return redirect()->route('favorites.index')->with('success', 'Favorite removed successfully.');
    }
}
