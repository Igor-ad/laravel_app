<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $page = 'Categories';
        $categories = Category::all();
        return view('category.index' , compact('categories', 'page'));
    }

    public function create()
    {
        $page = 'Create category';
        return view('category.create', compact('page'));
    }

    public function edit($id)
    {
        $page = 'Edit category';
        $category = Category::find($id);
        return view('category.edit', compact('category','page'));
    }

    public function store(CategoryStoreRequest $request)
    {
        $request->validated();
        $data = request(['title', 'description']);
        Category::create($data);
        return redirect()->to('categories');
    }

    public function show($id)
    {
        $page = 'View Category';
        $category = Category::find($id);
        return view('category.show', compact('category', 'page'));
    }


    public function update(CategoryStoreRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $request->validated();
        $data = request(['title', 'description']);
        $category->fill($data)->save();
        return redirect()->to('categories');
    }

    public function delete($id)
    {
        Category::destroy($id);
        return redirect()->to('categories');
    }
}
