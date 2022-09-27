<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;
use Shopper\Framework\Models\Shop\Order\Order;
use Shopper\Framework\Models\Shop\PaymentMethod;

class CartController extends Controller
{
    public function add(Request $request, $slug)
    {
        $product = Product::whereSlug($slug)->firstOrFail();
        \Cart::add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price_amount,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $product
        ));


        return redirect()->back();
    }

    public function remove(Request $request, $id)
    {
        \Cart::remove($id);


        return redirect()->back();
    }

    public function index()
    {
        return Inertia::render("Cart");
    }

    public function checkout(Request $request)
    {



        if (PaymentMethod::whereSlug('notchpay')->exists()) {

            $response = Http::withHeaders([
                "Authorization" => env('NOTCHPAY_KEY')
            ])->acceptJson()->withOptions([
                'verify' => false
            ])->post("https://api.notchpay.co/checkout/initialize", array("amount" => \Cart::getSubTotal(), "currency" => "XAF", "description" => "Shopwise checkout", "email" => $request->user()->email));



            if ($response->status() == 201) {

                $data = $response->json()['transaction'];


                $order = Order::create([
                    'price_amount' => $data['amount'],
                    'status' => 'pending',
                    'currency' => "xaf",
                    'number' => \Cart::getTotalQuantity(),
                    'user_id' => $request->user()->id
                ]);



                foreach (\Cart::getContent() as $item) {

                    $order->items()->create([
                        'product_id' => $item->associatedModel->id,
                        'product_type' => $item->associatedModel->type,
                        'quantity' => $item->quantity,
                        'unit_price_amount' => $item->associatedModel->price_amount,
                    ]);
                }
                Transaction::create([
                    'reference' => $data['reference'],
                    'amount' => $order->price_amount,
                    'status' => 'pending',
                    'cart_id' => $order->id,
                    'user_id' => $request->user()->id
                ]);

                return Inertia::location($response->json()['authorization_url']);
            }
        }
        return Inertia::render("Checkout");
    }

    public function handle(Request $request)
    {

        if ($request->status && $request->status == 'complete') {
            $transaction = Transaction::whereReference($request->reference)->firstOrFail();

            $order = Order::find($transaction->cart_id);
            $order->update(['status' => 'paid']);
            \Cart::clear();
            return Inertia::render("Checkout", ['order' => $order->refresh()]);
        }

        return Inertia::render("Checkout", ['order' => [
            'status' => 'failed'
        ]]);
    }
}
