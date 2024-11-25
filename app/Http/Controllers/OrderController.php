<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Models\Log;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('staff');
        $this->middleware('admin')->only('destroy');
    }

    public function index()
    {
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }

    public function new()
    {
        $categories = Category::with('products')->get();
        $users = User::select('id', 'name')->get();

        $data = compact('categories', 'users');
        return view('admin.orders.new', $data);
    }

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
    }

    public function edit(Order $order)
    {
        $categories = Category::with('products')->get();
        $users = User::select('id', 'name')->get();

        $data = compact('categories', 'order', 'users');
        return view('admin.orders.edit', $data);
    }

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
    }

    public function show(Order $order)
    {
        return view('admin.orders.show', compact('order'));
    }

    public function destroy(Order $order)
    {
        if ($order->can_delete()) {
            $text = ucwords(auth()->user()->name) .  " deleted Order " . $order->id . ", datetime: " . now();

            foreach ($order->products() as $product) {
                $product->delete();
            }

            $order->delete();
            Log::create(['text' => $text]);

            return redirect()->back()->with('success', "Order successfully deleted!");
        } else {
            return redirect()->back()->with('danger', 'Unable to delete');
        }
    }

    public function complete(Order $order)
    {
        $order->update([
            'status' => 'completed'
        ]);

        $text = ucwords(auth()->user()->name) .  " changed status of Order " . $order->id . " to completed, datetime: " . now();
        Log::create(['text' => $text]);

        return redirect()->back()->with('success', 'Order successfully completed!');
    }

    // Private
    private function attach_order($request)
    {
        $user = User::findOrFail($request->user_id);
        $order = $user->orders()->create([]);

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
        }

        $order->update([
            'total_price' => $total_price
        ]);
        $text .= " total price : " . $total_price;

        $text .= ", datetime: " . now();
        Log::create(['text' => $text]);
    }

    private function detach_order($order)
    {
        foreach ($order->products as $product) {

            $product->update([
                'quantity' => $product->quantity + $product->pivot->quantity
            ]);
        }

        $order->delete();
    }
}
