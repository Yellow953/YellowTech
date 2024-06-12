<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Order;
use App\Models\Product;
use App\Models\Project;
use App\Models\Ticket;
use App\Models\User;
use App\Models\ToDo;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('staff');
    }

    public function index()
    {
        $user = auth()->user();
        $orders_count = Order::count();
        $products_count = Product::count();
        $users_count = User::count();
        $projects_count = Project::count();
        $invoices_count = Invoice::count();
        $tickets_count = Ticket::count();
        $ongoing_todos = Todo::where('status', 'ongoing')
            ->where(function ($query) use ($user) {
                $query->where('public', true)
                    ->orWhere(function ($query) use ($user) {
                        $query->where('public', false)
                            ->where('user_id', $user->id);
                    });
            })
            ->paginate(10);

        $data = compact('orders_count', 'products_count', 'users_count', 'projects_count', 'invoices_count', 'tickets_count','ongoing_todos');

        return view('admin.dashboard', $data);
    }
}
