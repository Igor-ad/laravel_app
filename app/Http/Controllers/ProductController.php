<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Models\Category;
use App\Models\Product;

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
        $categories = Category::all();
        return view('product.edit', compact('product', 'categories'));
    }

    public function store(ProductStoreRequest $request)
    {
        Product::create($request->all());
        return redirect()->route('products');
    }

    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    public function update(ProductStoreRequest $request, Product $product)
    {
        $product->update($request->all());
        return redirect()->route('products');
    }

    public function delete(Product $product)
    {
        $product->delete();
        return redirect()->route('products');
    }
}
