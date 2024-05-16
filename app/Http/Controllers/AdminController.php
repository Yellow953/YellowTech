<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('staff');
    }

    public function index()
    {
        $orders_count = Order::count();
        $products_count = Product::count();
        $users_count = User::count();
        $projects_count = Project::count();
        $data = compact('orders_count', 'products_count', 'users_count', 'projects_count');

        return view('admin.dashboard', $data);
    }
}
