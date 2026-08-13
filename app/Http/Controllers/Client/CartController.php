<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('client.cart.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => ['required', 'integer', 'exists:products,id'],
        ]);

        return redirect()->back()->with('success', 'Haryt sebede goşuldy!');
    }

    public function destroy($id)
    {
        return redirect()->back()->with('success', 'Haryt sebetden aýyryldy!');
    }
}