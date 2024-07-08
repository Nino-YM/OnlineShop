<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('products.show', compact('reviews'));
    }

    public function create()
    {
        $this->authorize('create', Review::class);
        return view('reviews.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Review::class);
        
        $review = new Review();
        $review->rating = $request->rating;
        $review->comment = $request->comment;
        $review->product_id = $request->product_id;
        $review->user_id = Auth::id();
        $review->save();

        return redirect()->route('products.show', $review->product_id)->with('success', 'Review submitted successfully.');
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
        return redirect()->route('products.show');
    }

    public function destroy(Review $review)
    {
        $this->authorize('delete', $review);
        $productId = $review->product_id;
        $review->delete();
        return redirect()->route('products.show', $productId)->with('success', 'Review deleted successfully.');
    }
    
}
