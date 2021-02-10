<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $page = 'Products';
        $products = Product::with(['category'])->get();
        return view('product.index', compact('products', 'page'));
    }

    public function create()
    {
        $page = 'Create product';
        return view('product.create', compact('page'));
    }

    public function edit($id)
    {
        $page = 'Edit product';
        $product = Product::find($id);
        return view('product.edit', compact('product','page'));
    }

    public function store(ProductStoreRequest $request)
    {
        $request->validated();
        $data = request(['title', 'description', 'price']);
        Product::create($data);
        return redirect()->to('products');
    }

    public function show(Product $product)
    {
        $page = 'View Product';
        return view('product.show', compact('product', 'page'));
    }

    public function update(ProductStoreRequest $request, $id)
    {
        $category = Product::findOrFail($id);
        $request->validated();
        $data = request(['title', 'description', 'price']);
        $category->fill($data)->save();
        return redirect()->to('products');
    }

    public function delete($id)
    {
        Product::destroy($id);
        return redirect()->to('products');
    }
}
