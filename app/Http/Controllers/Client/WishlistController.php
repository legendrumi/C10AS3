<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        return view('client.wishlist.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => ['required', 'integer', 'exists:products,id'],
        ]);

        return redirect()->back()->with('success', 'Halanlaryma goşuldy!');
    }

    public function destroy($id)
    {
        return redirect()->back()->with('success', 'Halanlarymdan aýyryldy!');
    }
}