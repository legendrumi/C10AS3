<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::paginate(12);

        return view('client.brands.index', compact('brands'));
    }

    public function show($id)
    {
        $brand = Brand::with('products')->findOrFail($id);

        return view('client.brands.show', compact('brand'));
    }
}