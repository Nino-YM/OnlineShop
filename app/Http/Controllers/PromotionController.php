<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $promotions = Promotion::all();
        return view('promotions.index', compact('promotions'));
    }

    public function create()
    {
        $this->authorize('create', Promotion::class);
        return view('promotions.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Promotion::class);
        Promotion::create($request->all());
        return redirect()->route('promotions.index');
    }

    public function show(Promotion $promotion)
    {
        return view('promotions.show', compact('promotion'));
    }

    public function edit(Promotion $promotion)
    {
        $this->authorize('update', $promotion);
        return view('promotions.edit', compact('promotion'));
    }

    public function update(Request $request, Promotion $promotion)
    {
        $this->authorize('update', $promotion);
        $promotion->update($request->all());
        return redirect()->route('promotions.index');
    }

    public function destroy(Promotion $promotion)
    {
        $this->authorize('delete', $promotion);
        $promotion->delete();
        return redirect()->route('promotions.index')->with('success', 'Promotion deleted successfully.');
    }
}
