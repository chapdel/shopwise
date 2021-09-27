<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Shopper\Framework\Models\Shop\Product\Product;
use Notchpay\Transaction;
use Illuminate\Support\Str;
use Shopper\Framework\Models\Shop\Order\Order;

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
            "reference" => Str::random(12),
            "unit_price_amount" => \Cart::getTotal()
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

        try {
            $transaction = $notchpay->init(array("amount" => $order->price_amount, "currency" => "XAF", "description" => "Shopwise checkout", "email" => $user->email, "callback" => route('order.callback')));
            $order->reference = $transaction->transaction->reference;
            $order->save();
            return redirect()->away($transaction->authorization_url);
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function callback(Request $request)
    {
        if ($request->reference) {
            $notchpay = new Transaction("SANDBOX_524798867350");

            try {

                $transaction = $notchpay->fetch($request->reference);
                if ($transaction) {
                    switch ($transaction->status) {
                        case 'complete':
                            //update status
                            Order::whereReference($transaction->reference)->update(['status' => "paid"]);

                            //clear cart
                            \Cart::clear();

                            return redirect()->route("cart");

                            break;
                        case "pending":
                            //redirect cart with pending status
                            return redirect()->route("cart");
                        default:
                            Order::whereReference($transaction->reference)->update(['status' => "cancelled"]);
                            return redirect()->route("cart");
                            break;
                    }
                }
            } catch (\Throwable $th) {
                dd($th);
            }
        } else {
            //redirect cart with pending status
            return redirect()->route("cart");
        }
    }
}
