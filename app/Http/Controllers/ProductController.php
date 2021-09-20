<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Shopper\Framework\Repositories\Ecommerce\ProductRepository;

class ProductController extends Controller
{
    public function show(Request $request, $slug)
    {
        return view('product.details', ['product' => (new ProductRepository())
            ->makeModel()
            ->whereSlug($slug)->first()]);
    }
}
