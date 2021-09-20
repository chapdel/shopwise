<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Shopper\Framework\Models\Shop\Product\Category;
use Shopper\Framework\Models\Shop\Product\Product;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'q' => ['required']
        ]);

        $products = Product::where('name',  'like', '%' . $request->q . '%')->orWhere('slug',  'like', '%' . $request->q . '%')->get();
        //dd(Category::where('name',  'like', '%' . $request->q . '%')->orWhere('slug',  'like', '%' . $request->q . '%')->get());
        /* Category::where('name',  'like', '%' . $request->q . '%')->get()->each(function ($category, $key) use ($products) {
            dd($category->products()->get());
        });

        dd($products, 'rf'); */
        return view('search', compact('products'));
    }
}
