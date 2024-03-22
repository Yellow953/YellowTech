<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Order;
use App\Models\Product;
use App\Models\Promo;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth')->only(['order', 'checkout']);
    }

    public function cart()
    {
        try {
            $cart_items = json_decode($_COOKIE['cart'], true);
        } catch (\Throwable $th) {
            $cart_items = [];
        }

        $data = compact('cart_items');
        return view('cart', $data);
    }

    public function checkout()
    {
        $subtotal = 0;
        $total = 0;

        try {
            $cart_items = json_decode($_COOKIE['cart'], true);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'No Items in your Cart!');
        }

        if ($cart_items != []) {
            foreach ($cart_items as $productID => $cart_item) {
                $item = Product::find($productID);
                $subtotal += $item->unit_price * $cart_item['quantity'];
            }
        }

        $total = $subtotal;
        $data = compact('cart_items', 'subtotal', 'total');
        return view('checkout', $data);
    }

    public function order(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'city' => 'required',
            'address' => 'required',
        ]);

        $discount = 0;
        $total_price = 0;

        try {
            $cart_items = json_decode($_COOKIE['cart'], true);
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', 'No Items in your Cart!');
        }

        if ($request->promo != null) {
            $promo = Promo::where('name', 'LIKE', $request->promo)->firstOrFail();
            $discount = $promo->value;
        }

        $order = new Order();

        $client = Client::where('email', $request->email)->first();
        if ($client == null) {
            $client = Client::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'city' => $request->city,
                'address' => $request->address,
            ]);
        }

        $order->client_id = $client->id;
        $order->status = 'new';
        $order->save();

        foreach ($cart_items as $productID => $cart_item) {
            $product = Product::find($productID);

            $order->products()->attach($product, ['quantity' => $cart_item['quantity']]);
            $total_price += $product->unit_price * $cart_item['quantity'];

            $product->update([
                'quantity' => $product->quantity - $cart_item['quantity']
            ]);
        }

        if ($discount != 0) {
            $total_price -= ($total_price * $discount / 100);
        }

        $order->total_price = $total_price;

        $order->save();
        $cookie = cookie()->forget('cart');

        return redirect()->route('cart')->with('success', 'Order Submitted, Please check your email for confirmation. Thank You For Choosing Us!')->cookie($cookie);
    }
}
