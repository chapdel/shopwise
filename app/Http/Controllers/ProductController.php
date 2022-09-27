<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function addToCart(Request $request, $slug)
    {
        $product = Product::whereSlug($slug)->firstOrFail();
        dd($product);
    }
}
