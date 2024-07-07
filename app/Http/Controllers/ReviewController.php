<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('viewAny', Review::class);
        $reviews = Review::with('product', 'user')->get();
        return view('reviews.index', compact('reviews'));
    }

    public function create()
    {
        $this->authorize('create', Review::class);
        return view('reviews.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Review::class);
        Review::create($request->all());
        return redirect()->route('reviews.index');
    }

    public function show(Review $review)
    {
        $this->authorize('view', $review);
        return view('reviews.show', compact('review'));
    }

    public function edit(Review $review)
    {
        $this->authorize('update', $review);
        return view('reviews.edit', compact('review'));
    }

    public function update(Request $request, Review $review)
    {
        $this->authorize('update', $review);
        $review->update($request->all());
        return redirect()->route('reviews.index');
    }

    public function destroy(Review $review)
    {
        $this->authorize('delete', $review);
        $review->delete();
        return redirect()->route('reviews.index')->with('success', 'Review deleted successfully.');
    }
}
