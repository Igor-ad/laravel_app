<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category'])->get();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    public function edit(Product $product)
    {
        $product = Product::find($product->id);
        $categories = Category::all();
        $category = Category::find($product->category_id);
        return view('product.edit', compact('product', 'category', 'categories'));
    }

    public function store(ProductStoreRequest $request)
    {
        $request->validated();
        $data = request(['title', 'description', 'price', 'category_id']);
        Category::findOrFail($data['category_id']);
        Product::create($data);
        return redirect()->route('products');
    }

    public function show(Product $product)
    {
        $category = Category::find($product->category_id);
        return view('product.show', compact('product', 'category'));
    }

    public function update(ProductStoreRequest $request, Product $product)
    {
        $product = Product::findOrFail($product->id);
        $request->validated();
        $data = request(['title', 'description', 'price', 'category_id']);
        $product->update($data);
        return redirect()->route('products');
    }

    public function delete(Product $product)
    {
        Product::destroy($product->id);
        return redirect()->route('products');
    }
}
