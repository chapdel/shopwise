<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Shopper\Framework\Models\Shop\Product\Product;
use Notchpay\Transaction;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function store()
    {

        $items = Product::find(\Cart::getContent()->pluck('id'));


        $user = auth()->user();

        $order = $user->orders()->create([
            "price_amount" => \Cart::getTotal(),
            "currency" => "XAF",
            "number" => 1,
            "status" => "pending",
            "reference" => Str::random(12)
        ]);

       

        foreach ($items as $item) {
            $category = $item->categories()->first();
            $order->items()->create([
                'id' => $item->id,
                'product_type' => $category ? $category->id : "Undefined",
                'product_id' => $item->id,
                'quantity' => 1,    
                'unit_price_amount' => $item->price_amount
            ]);
        }

        $notchpay = new Transaction("SANDBOX_524798867350");

        $transaction = $notchpay->init( array ( "amount" => $order->price_amount , "currency" => "XAF" , "description" => "Shopwise checkout" , "email" => $user->email, "redirect_url" => route('cart')));

        return redirect()->away($transaction->authorization_url);
    }
}
