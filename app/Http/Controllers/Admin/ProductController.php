<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with(['category', 'brand']);

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('name_tm', 'like', "%{$search}%")
                    ->orWhere('name_ru', 'like', "%{$search}%")
                    ->orWhere('code', 'like', "%{$search}%");
            });
        }

        $products = $query->latest()->paginate(25)->withQueryString();

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
            'image' => ['nullable', 'image', 'mimes:jpg,png,jpeg,webp', 'max:2048'],
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

    public function edit(Product $product)
    {
        $categories = Category::all();
        $brands = Brand::all();

        return view('admin.products.edit', compact('product', 'categories', 'brands'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'name_tm' => ['nullable', 'string', 'max:255'],
            'name_ru' => ['nullable', 'string', 'max:255'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'brand_id' => ['required', 'integer', 'exists:brands,id'],
            'price' => ['required', 'numeric', 'min:0'],
            'discount' => ['nullable', 'numeric', 'min:0', 'max:100'],
            'code' => ['required', 'string', 'unique:products,code,' . $product->id], 
            'image' => ['nullable', 'image', 'mimes:jpg,png,jpeg,webp', 'max:2048'],
            'description' => ['nullable', 'string'],
            'description_tm' => ['nullable', 'string'],
            'description_ru' => ['nullable', 'string'],
        ]);

        $imagePath = $product->image;
        if ($request->hasFile('image')) {
            if ($imagePath && Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
            $imagePath = $request->file('image')->store('img/products', 'public');
        }

        $product->update([
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

        return redirect()->route('admin.products.index')->with('success', 'Haryt üstünlikli üýtgedildi!');
    }

    public function destroy(Product $product)
    {
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }
        
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Haryt pozuldy!');
    }
}