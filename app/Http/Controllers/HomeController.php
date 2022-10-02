<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Shopper\Framework\Repositories\Ecommerce\CategoryRepository;
use Shopper\Framework\Repositories\Ecommerce\ProductRepository;

class HomeController extends Controller
{
    public function index()
    {

        /* dd((new ProductRepository())
            ->makeModel()->first()->media); */
        return Inertia::render("Welcome", [
            'popular' => (new ProductRepository())
                ->makeModel()
                ->paginate(),
            'arrival' => (new ProductRepository())
                ->makeModel()
                ->orderBy('created_at', 'DESC')
                ->paginate(),
            'categories' => (new CategoryRepository())
                ->paginate(6),
        ]);
    }

    public function show(Request $request, $product)
    {
        $product = Product::whereSlug($product)->first();
        return Inertia::render("ProductDetails", ['product' => $product]);
    }
}
