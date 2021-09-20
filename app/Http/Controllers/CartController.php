<?php

namespace App\Http\Controllers;

use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Http\Request;
use Shopper\Framework\Models\Shop\Product\Product;

class CartController extends Controller
{
    public function index()
    {
        return view('card');
    }

    public function add(Request $request)
    {
        $request->validate([
            'quantity' => ['nullable', 'integer', 'min:1'],
            'id' => ['required']
        ]);
        $product = Product::findOrFail($request->id);


        CartFacade::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price_amount,
            'quantity' => $request->quantity ?? 1,
        ], 1);
        notify()->success('Added to Cart ⚡️');
        return redirect()->back();
    }

    public function remove(Request $request, $id)
    {
        CartFacade::remove($id);
        notify()->success('Item removed to Cart ⚡️');
        return redirect()->back();
    }
}
