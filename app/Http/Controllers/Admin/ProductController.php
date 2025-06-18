<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('categories')->latest()->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'categories' => 'required|array'
        ]);

        $product = Product::create($request->only('name', 'description'));
        $product->categories()->sync($request->categories);

        return redirect()->route('admin.products.index')->with('success', 'Product created with categories!');
    }

    public function edit(Product $product)
    {
        $categories = Category::orderBy('name')->get();
        $selected = $product->categories->pluck('id')->toArray();
        return view('admin.products.edit', compact('product', 'categories', 'selected'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'categories' => 'required|array'
        ]);

        $product->update($request->only('name', 'description'));
        $product->categories()->sync($request->categories);

        return redirect()->route('admin.products.index')->with('success', 'Product updated!');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('success', 'Product deleted!');
    }
}
