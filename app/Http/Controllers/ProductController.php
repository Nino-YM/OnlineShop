<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $products = Product::where('stock_quantity', '>', 0)->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $this->authorize('create', Product::class);
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', Product::class);

        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock_quantity' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'image_url' => 'nullable|url',
            'image' => 'nullable|file|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $validatedData['image_url'] = asset('storage/' . $imagePath);
            $validatedData['image_name'] = $request->file('image')->getClientOriginalName();
        }

        Product::create($validatedData);

        return redirect()->route('products.index');
    }


    public function show(Product $product)
    {
        $product->load(['reviews.user']);
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $this->authorize('update', $product);
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $this->authorize('update', $product);
        $product->update($request->all());
        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $this->authorize('delete', $product);

        if ($product->image_name) {
            Storage::disk('public')->delete($product->image_name);
        }

        $product->delete();
        return redirect()->route('products.index');
    }
}
