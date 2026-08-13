<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(12);

        return view('client.categories.index', compact('categories'));
    }

    public function show($id)
    {
        $category = Category::with('products')->findOrFail($id);

        return view('client.categories.show', compact('category'));
    }
}