<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        $productsCount = Product::count();
        $categoriesCount = Category::count();
        $brandsCount = Brand::count();

        return view('admin.dashboard.index', compact('productsCount', 'categoriesCount', 'brandsCount'));
    }
}