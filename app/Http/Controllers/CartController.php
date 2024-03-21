<?php

namespace App\Http\Controllers;

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
        $sub_total = 0;
        try {
            $cart_items = json_decode($_COOKIE['cart'], true);
        } catch (\Throwable $th) {
            $cart_items = [];
        }

        if ($cart_items != []) {
            foreach ($cart_items as $productID => $cart_item) {
                $item = Product::find($productID);
                $sub_total += $item->unit_price * $cart_item['quantity'];
            }
        }

        $data = compact('cart_items', 'sub_total');
        return view('cart', $data);
    }

    public function checkout()
    {
        $sub_total = 0;
        $total = 0;

        try {
            $cart_items = json_decode($_COOKIE['cart'], true);
        } catch (\Throwable $th) {
            $cart_items = [];
        }

        if ($cart_items != []) {
            foreach ($cart_items as $productID => $cart_item) {
                $item = Product::find($productID);
                $sub_total += $item->unit_price * $cart_item['quantity'];
            }
        }

        $total = $sub_total;
        $data = compact('cart_items', 'sub_total', 'total');
        return view('checkout', $data);
    }

    public function order(Request $request)
    {
        $discount = 0;
        $total_price = 0;

        try {
            $cart_items = json_decode($_COOKIE['cart'], true) ?? [];
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'No Items in your Cart!');
        }

        if ($request->promo != null) {
            $promo = Promo::where('name', 'LIKE', $request->promo)->firstOrFail();
            $discount = $promo->value;
        }

        $order = new Order();
        $order->client_id = 1;
        $order->status = 'new';
        $order->save();

        foreach ($cart_items as $productID => $cart_item) {
            $product = Product::find($productID);

            if ($product->quantity - $cart_item['quantity'] < 0 || $cart_item['quantity'] < 0) {
                return redirect()->back()->with('danger', 'Product not available...');
            }

            $order->products()->attach($product, ['quantity' => $cart_item['quantity']]);
            $total_price += $product->unit_price * $cart_item['quantity'];

            $product->update([
                'quantity' => $product->quantity - $cart_item['quantity']
            ]);
        }

        if ($discount != 0) {
            $total_price -= ($total_price * $discount);
        }

        $order->total_price = $total_price;

        $order->save();
        $cookie = cookie()->forget('cart');

        return redirect()->back()->with('success', 'Order Submitted, Thank You For Choosing Us!')->cookie($cookie);
    }
}
