<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Paginator::useBootstrapFive();

        View::composer('client.layouts.header', function ($view) {
            $cart = session()->get('cart', []);
            $wishlist = session()->get('wishlist', []);

            $cartCount = array_sum(array_column($cart, 'quantity'));
            $wishlistCount = count($wishlist);

            $view->with(compact('cartCount', 'wishlistCount'));
        });
    }
}