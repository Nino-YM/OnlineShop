<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Product;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $products = Product::all(); // Fetch all products to pass to the view
        return view('promotions.create', compact('products'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', Promotion::class);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'discount_percentage' => 'required|numeric|min:0|max:100',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'products' => 'required|array',
            'products.*' => 'exists:products,id',
        ]);

        $promotion = Promotion::create($validatedData);

        $promotion->products()->attach($request->products);

        return redirect()->route('promotions.index');
    }

    public function show($id)
    {
        $promotion = Promotion::findOrFail($id);
        $products = Product::whereExists(function ($query) use ($id) {
            $query->select(DB::raw(1))
                  ->from('promotions')
                  ->join('product_promotion', 'promotions.id', '=', 'product_promotion.promotion_id')
                  ->whereColumn('products.id', 'product_promotion.product_id')
                  ->where('promotions.id', $id)
                  ->where('products.stock_quantity', '>', 0);
        })->get();
    
        return view('promotions.show', compact('promotion', 'products'));
    }

    public function edit(Promotion $promotion)
    {
        $this->authorize('update', $promotion);
        $products = Product::all();
        return view('promotions.edit', compact('promotion', 'products'));
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
