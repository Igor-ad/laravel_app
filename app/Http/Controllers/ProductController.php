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
        $page = 'Products';
        $products = Product::with(['category'])->get();
        return view('product.index', compact('products', 'page'));
    }

    public function create()
    {
        $page = 'Create product';
        $categories = Category::all();
        return view('product.create', compact('categories', 'page'));
    }

    public function edit($id)
    {
        $page = 'Edit product';
        $product = Product::find($id);
        $categories = Category::all();
        $category = Category::find($product['category_id']);
        return view('product.edit', compact('product', 'category', 'categories', 'page'));
    }

    public function store(ProductStoreRequest $request)
    {
        $request->validated();
        $data = request(['category_id', 'title', 'description', 'price']);
        Product::create($data);
        return redirect()->to('products');
    }

    public function show(Product $product)
    {
        $page = 'View Product';
        $category = Category::find($product['category_id']);
        return view('product.show', compact('product', 'category', 'page'));
    }

    public function update(ProductStoreRequest $request, $id)
    {
        $category = Product::findOrFail($id);
        $request->validated();
        $data = request(['category_id', 'title', 'description', 'price']);
        $category->fill($data)->save();
        return redirect()->to('products');
    }

    public function delete($id)
    {
        Product::destroy($id);
        return redirect()->to('products');
    }
}
