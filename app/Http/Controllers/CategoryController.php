<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;

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
        $request->validated();
        $data = request(['title', 'description']);
        Category::create($data);
        return redirect()->route('categories');
    }

    public function show(Category $category)
    {
        return view('category.show', compact('category'));
    }


    public function update(CategoryStoreRequest $request, Category $category)
    {
        $category = Category::findOrFail($category->id);
        $request->validated();
        $data = request(['title', 'description']);
        $category->update($data);
        return redirect()->route('categories');
    }

    public function delete(Category $category)
    {
        Category::destroy($category->id);
        return redirect()->route('categories');
    }
}
