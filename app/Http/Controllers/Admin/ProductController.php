<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'brand'])->latest()->paginate(25)->withQueryString();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();

        return view('admin.products.create', compact('categories', 'brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'name_tm' => ['nullable', 'string', 'max:255'],
            'name_ru' => ['nullable', 'string', 'max:255'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'brand_id' => ['required', 'integer', 'exists:brands,id'],
            'price' => ['required', 'numeric', 'min:0'],
            'discount' => ['nullable', 'numeric', 'min:0', 'max:100'],
            'code' => ['required', 'string', 'unique:products,code'],
            'image' => ['nullable', 'image', 'mimes:jpg,png,jpeg', 'max:2048'],
            'description' => ['nullable', 'string'],
            'description_tm' => ['nullable', 'string'],
            'description_ru' => ['nullable', 'string'],
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('img/products', 'public');
        }

        Product::create([
            'name' => $request->name,
            'name_tm' => $request->name_tm,
            'name_ru' => $request->name_ru,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'price' => $request->price,
            'discount' => $request->discount ?? 0,
            'code' => $request->code,
            'image' => $imagePath,
            'description' => $request->description,
            'description_tm' => $request->description_tm,
            'description_ru' => $request->description_ru,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Haryt üstünlikli döredildi!');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Haryt pozuldy!');
    }
}