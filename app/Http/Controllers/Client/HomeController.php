<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $latestProducts = Product::with(['category', 'brand'])->latest()->take(8)->get();
        $categories = Category::take(6)->get();
        $brands = Brand::take(6)->get();

        return view('client.home.index', compact('latestProducts', 'categories', 'brands'));
    }

    public function locale($locale)
    {
        $locale = in_array($locale, ['tm', 'ru']) ? $locale : 'en';
        session()->put('locale', $locale);

        return redirect()->back();
    }
}