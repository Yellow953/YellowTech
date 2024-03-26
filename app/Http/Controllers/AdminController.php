<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Order;
use App\Models\Product;
use App\Models\Project;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $orders_count = Order::count();
        $products_count = Product::count();
        $clients_count = Client::count();
        $projects_count = Project::count();
        $data = compact('orders_count', 'products_count', 'clients_count', 'projects_count');

        return view('admin.dashboard', $data);
    }
}
