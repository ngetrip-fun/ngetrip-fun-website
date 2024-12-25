<?php

namespace App\Services;

use App\Models\Product;

class FrontService
{
    public function getFrontPageData(): array
    {
        $popularProducts = Product::where('is_popular', 1)->latest()->get();
        $newProducts = Product::latest()->get();

        return compact('popularProducts', 'newProducts');
    }
}
