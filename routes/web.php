<?php

use Illuminate\Support\Facades\Route;

Route::get('locale/{locale}', function ($locale) {
    if (in_array($locale, ['tm', 'ru', 'en'])) {
        session()->put('locale', $locale);
    }
    return redirect()->back();
})->name('locale')->where('locale', '[a-z]+');

require __DIR__ . '/web_admin.php';
require __DIR__ . '/web_client.php';