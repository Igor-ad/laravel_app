<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category.index' , compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    public function store(CategoryStoreRequest $request)
    {
        Category::create($request->all());
        return redirect()->route('categories');
    }

    public function show(Category $category)
    {
        return view('category.show', compact('category'));
    }


    public function update(CategoryStoreRequest $request, Category $category)
    {
        $category->update($request->all());
        return redirect()->route('categories');
    }

    public function delete(Category $category)
    {
        $category->delete();
        return redirect()->route('categories');
    }
}
