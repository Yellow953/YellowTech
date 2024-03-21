<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Client;
use App\Models\Log;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }

    public function new()
    {
        $categories = Category::with('products')->get();
        $clients = Client::select('id', 'name')->get();

        $data = compact('categories', 'clients');
        return view('admin.orders.new', $data);
    } //end of new

    public function create(Request $request)
    {
        $request->validate([
            'products' => 'required|array',
        ]);

        foreach ($request->products as $id => $quantity) {
            $product = Product::FindOrFail($id);
            if (($product->quantity - $quantity['quantity']) < 0) {
                return redirect()->back()->with('danger', 'Product not available...');
            }
        }
        $this->attach_order($request);

        session()->flash('success', "Order created successfully");
        return redirect()->route('orders');
    } //end of create

    public function edit(Order $order)
    {
        $categories = Category::with('products')->get();
        $clients = Client::select('id', 'name')->get();

        $data = compact('categories', 'order', 'clients');
        return view('admin.orders.edit', $data);
    } //end of edit

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'products' => 'required|array',
        ]);

        $this->detach_order($order);

        foreach ($request->products as $id => $quantity) {
            $product = Product::FindOrFail($id);
            if (($product->quantity - $quantity['quantity']) < 0) {
                return redirect()->back()->with('danger', 'Product not available...');
            }
        }
        $this->attach_order($request);

        session()->flash('success', "Order updated successfully");
        return redirect()->route('orders');
    } //end of update

    public function show(Order $order)
    {
        return view('admin.orders.show', compact('order'));
    }

    public function destroy(Order $order)
    {
        $text = $order->client->name . " deleted Order " . $order->id . ", datetime: " . now();
        Log::create(['text' => $text]);

        $order->delete();
        session()->flash('success', "Order successfully deleted!");
        return redirect()->back();
    } //end of order

    public function complete(Order $order)
    {
        $order->update([
            'status' => 'completed'
        ]);
        return redirect()->back()->with('success', 'Order successfully completed!');
    }

    // Private 

    private function attach_order($request)
    {
        $client = Client::findOrFail($request->client_id);
        $order = $client->orders()->create([]);

        $text = "Order " . $order->id . " : ";
        $total_price = 0;

        foreach ($request->products as $id => $item) {
            if ($item['quantity'] <= 0) {
                return redirect()->back()->with('danger', 'Negative Values...');
            }

            $product = Product::FindOrFail($id);
            $text .= $product->name . " : " . $item['quantity'] . " , ";

            $total_price += $product->unit_price * $item['quantity'];
            $order->products()->attach([
                $id => [
                    'quantity' => $item['quantity'],
                ]
            ]);

            $product->update([
                'quantity' => $product->quantity - $item['quantity']
            ]);
        } //end of foreach

        $order->update([
            'total_price' => $total_price
        ]);
        $text .= " total price : " . $total_price;

        $text .= ", datetime: " . now();
        Log::create(['text' => $text]);
    } //end of attach order

    private function detach_order($order)
    {
        foreach ($order->products as $product) {

            $product->update([
                'quantity' => $product->quantity + $product->pivot->quantity
            ]);
        } //end of for each

        $order->delete();
    } //end of detach order
}
