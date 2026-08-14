<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = session()->get('wishlist', []);
        return view('client.wishlist.index', compact('wishlist'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => ['required', 'integer', 'exists:products,id'],
        ]);

        $wishlist = session()->get('wishlist', []);
        $productId = $request->product_id;

        if (!isset($wishlist[$productId])) {
            $product = Product::find($productId);
            $wishlist[$productId] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
            ];
        }

        session()->put('wishlist', $wishlist);

        return redirect()->back()->with('success', 'Halanlaryma goşuldy!');
    }

    public function destroy($id)
    {
        $wishlist = session()->get('wishlist', []);
        if (isset($wishlist[$id])) {
            unset($wishlist[$id]);
            session()->put('wishlist', $wishlist);
        }

        return redirect()->back()->with('success', 'Halanlarymdan aýyryldy!');
    }
}