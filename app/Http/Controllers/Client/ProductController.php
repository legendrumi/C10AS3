<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'search' => ['nullable', 'string'],
            'category_id' => ['nullable', 'integer', 'min:1'],
            'brand_id' => ['nullable', 'integer', 'min:1'],
            'min_price' => ['nullable', 'numeric', 'min:0'],
            'max_price' => ['nullable', 'numeric', 'min:0'],
            'discount' => ['nullable', 'boolean'],
            'sortBy' => ['nullable', 'string'],
        ]);

        $sortByType = $request->sortBy ? $request->sortBy : 'newest';
        $query = Product::with(['category', 'brand']);

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('code', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('brand_id')) {
            $query->where('brand_id', $request->brand_id);
        }

        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        if ($request->filled('discount') && $request->discount == 1) {
            $query->where('discount', '>', 0);
        }

        if ($sortByType == 'name') {
            $query->orderBy('name', 'asc');
        } else {
            $query->orderBy('created_at', 'desc');
        }

        $products = $query->paginate(12)->withQueryString();
        $categories = Category::all();
        $brands = Brand::all();

        return view('client.products.index', compact('products', 'categories', 'brands'));
    }

    public function show($id)
    {
        $product = Product::with(['category', 'brand'])->findOrFail($id);

        return view('client.products.show', compact('product'));
    }
}