<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Log;
use App\Models\Product;
use App\Models\Order;
use App\Models\Invoice;
use App\Models\Ticket;
use App\Models\Project;
use App\Models\Promo;
use App\Models\User;
use Illuminate\Http\Request;
use App\Exports\CategoriesExport;
use App\Exports\ProductsExport;
use App\Exports\OrdersExport;
use App\Exports\PromosExport;
use App\Exports\ProjectsExport;
use App\Exports\InvoicesExport;
use App\Exports\TicketsExport;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File;

class MultipleSelectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function multipleSelection(Request $request)
    {
        $action = $request->action;
        $page = $request->page;

        switch ($page) {
            case 'categories':
                switch ($action) {
                    case 'delete':
                        $this->deleteCategories($request);
                        break;
                    case 'export':
                        $this->exportCategories($request);
                        break;
                    default:
                        return redirect()->back()->with('error', 'No action selected...');
                        break;
                }
                break;

            case 'products':
                switch ($action) {
                    case 'delete':
                        $this->deleteProducts($request);
                        break;
                    case 'export':
                        $this->exportProducts($request);
                        break;
                    default:
                        return redirect()->back()->with('error', 'No action selected...');
                        break;
                }
                break;

            case 'orders':
                switch ($action) {
                    case 'delete':
                        $this->deleteOrders($request);
                        break;
                    case 'export':
                        $this->exportOrders($request);
                        break;
                    default:
                        return redirect()->back()->with('error', 'No action selected...');
                        break;
                }
                break;

            case 'promos':
                switch ($action) {
                    case 'delete':
                        $this->deletePromos($request);
                        break;
                    case 'export':
                        $this->exportPromos($request);
                        break;
                    default:
                        return redirect()->back()->with('error', 'No action selected...');
                        break;
                }
                break;

            case 'projects':
                switch ($action) {
                    case 'delete':
                        $this->deleteProjects($request);
                        break;
                    case 'export':
                        $this->exportProjects($request);
                        break;
                    default:
                        return redirect()->back()->with('error', 'No action selected...');
                        break;
                }
                break;

            case 'invoices':
                switch ($action) {
                    case 'delete':
                        $this->deleteInvoices($request);
                        break;
                    case 'export':
                        $this->exportInvoices($request);
                        break;
                    default:
                        return redirect()->back()->with('error', 'No action selected...');
                        break;
                }
                break;

            case 'tickets':
                switch ($action) {
                    case 'delete':
                        $this->deleteTickets($request);
                        break;
                    case 'export':
                        $this->exportTickets($request);
                        break;
                    default:
                        return redirect()->back()->with('error', 'No action selected...');
                        break;
                }
                break;

            case 'users':
                switch ($action) {
                    case 'delete':
                        $this->deleteUsers($request);
                        break;
                    case 'export':
                        $this->exportUsers($request);
                        break;
                    default:
                        return redirect()->back()->with('error', 'No action selected...');
                        break;
                }
                break;

            default:
                return redirect()->back()->with('error', 'No action selected...');
                break;
        }

        return redirect()->back()->with('success', 'Action Successfully executed...');
    }

    // Categories
    private function deleteCategories($request)
    {
        $ids = $request->input('ids');

        if ($ids && is_array($ids)) {
            foreach ($ids as $id) {
                $category = Category::find($id);
                if ($category->can_delete()) {
                    $text = ucwords(auth()->user()->name) .  " deleted Category " . $category->name . ", datetime: " . now();
                    $category->delete();
                    Log::create(['text' => $text]);
                }
            }
        }
        return;
    }

    private function exportCategories($request)
    {
        $ids = $request->input('ids');

        if ($ids && is_array($ids)) {
            return Excel::download(new CategoriesExport($ids), 'categories.xlsx');
        }

        return redirect()->back()->with('error', 'No categories selected for export.');
    }

    // Products
    private function deleteProducts($request)
    {
        $ids = $request->input('ids');

        foreach ($ids as $id) {
            $product = Product::find($id);
            if ($product->can_delete()) {
                $text = ucwords(auth()->user()->name) .  " deleted Product: " . $product->name . " deleted, datetime: " . now();

                if ($product->image != '/assets/images/no_img.png') {
                    $path = public_path($product->image);
                    File::delete($path);
                }

                foreach ($product->secondary_images as $attachment) {
                    $path = public_path($attachment->path);
                    File::delete($path);

                    $attachment->delete();
                }

                $product->delete();
                Log::create(['text' => $text]);
            }
        }

        return;
    }

    private function exportProducts($request)
    {
        $ids = $request->input('ids');

        if ($ids && is_array($ids)) {
            return Excel::download(new ProductsExport($ids), 'products.xlsx');
        }

        return redirect()->back()->with('error', 'No products selected for export.');
    }

    // Orders
    private function deleteOrders($request)
    {
        $ids = $request->input('ids');

        if ($ids && is_array($ids)) {
            foreach ($ids as $id) {
                $order = Order::find($id);
                if ($order->can_delete()) {
                    $text = ucwords(auth()->user()->name) .  " deleted Order " . $order->id . ", datetime: " . now();

                    foreach ($order->products() as $product) {
                        $product->delete();
                    }

                    $order->delete();
                    Log::create(['text' => $text]);
                }
            }
        }
        return;
    }

    private function exportOrders($request)
    {
        $ids = $request->input('ids');

        if ($ids && is_array($ids)) {
            return Excel::download(new OrdersExport($ids), 'orders.xlsx');
        }

        return redirect()->back()->with('error', 'No orders selected for export.');
    }

    // Promos
    private function deletePromos($request)
    {
        $ids = $request->input('ids');

        if ($ids && is_array($ids)) {
            foreach ($ids as $id) {
                $promo = Promo::find($id);
                if ($promo->can_delete()) {
                    $text = ucwords(auth()->user()->name) .  " deleted promo " . $promo->name . ", datetime: " . now();

                    $promo->delete();
                    Log::create(['text' => $text]);
                }
            }
        }

        return;
    }

    private function exportPromos($request)
    {
        $ids = $request->input('ids');

        if ($ids && is_array($ids)) {
            return Excel::download(new PromosExport($ids), 'promos.xlsx');
        }

        return redirect()->back()->with('error', 'No promos selected for export.');
    }

    // Projects
    private function deleteProjects($request)
    {
        $ids = $request->input('ids');

        if ($ids && is_array($ids)) {
            foreach ($ids as $id) {
                $project = Project::find($id);
                if ($project->can_delete()) {
                    $text = ucwords(auth()->user()->name) .  " deleted project " . $project->name . ", datetime: " . now();

                    foreach ($project->images as $attachment) {
                        $path = public_path($attachment->path);
                        File::delete($path);

                        $attachment->delete();
                    }

                    $project->delete();
                    Log::create(['text' => $text]);
                }
            }
        }

        return;
    }

    private function exportProjects($request)
    {
        $ids = $request->input('ids');

        if ($ids && is_array($ids)) {
            return Excel::download(new ProjectsExport($ids), 'projects.xlsx');
        }

        return redirect()->back()->with('error', 'No projects selected for export.');
    }

    // Invoices
    private function deleteInvoices($request)
    {
        $ids = $request->input('ids');

        if ($ids && is_array($ids)) {
            foreach ($ids as $id) {
                $invoice = Invoice::find($id);
                if ($invoice->can_delete()) {
                    $text = ucwords(auth()->user()->name) .  " deleted invoice " . $invoice->name . ", datetime: " . now();

                    foreach ($invoice->items as $item) {
                        $item->delete();
                    }

                    $invoice->delete();
                    Log::create(['text' => $text]);
                }
            }
        }

        return;
    }

    private function exportInvoices($request)
    {
        $ids = $request->input('ids');

        if ($ids && is_array($ids)) {
            return Excel::download(new InvoicesExport($ids), 'invoices.xlsx');
        }

        return redirect()->back()->with('error', 'No invoices selected for export.');
    }

    // Tickets
    private function deleteTickets($request)
    {
        $ids = $request->input('ids');

        if ($ids && is_array($ids)) {
            foreach ($ids as $id) {
                $ticket = Ticket::find($id);
                if ($ticket->can_delete()) {
                    $text = ucwords(auth()->user()->name) .  " deleted ticket " . $ticket->name . ", datetime: " . now();

                    foreach ($ticket->attachments as $attachment) {
                        $path = public_path($attachment->path);
                        File::delete($path);

                        $attachment->delete();
                    }

                    $ticket->delete();
                    Log::create(['text' => $text]);
                }
            }
        }

        return;
    }

    private function exportTickets($request)
    {
        $ids = $request->input('ids');

        if ($ids && is_array($ids)) {
            return Excel::download(new TicketsExport($ids), 'tickets.xlsx');
        }

        return redirect()->back()->with('error', 'No tickets selected for export.');
    }

    // Users
    private function deleteUsers($request)
    {
        $ids = $request->input('ids');

        if ($ids && is_array($ids)) {
            foreach ($ids as $id) {
                $user = User::find($id);
                if ($user->can_delete()) {
                    $text = ucwords(auth()->user()->name) .  " deleted user " . $user->name . ", datetime: " . now();

                    $user->delete();
                    Log::create(['text' => $text]);
                }
            }
        }

        return;
    }

    private function exportUsers($request)
    {
        $ids = $request->input('ids');

        if ($ids && is_array($ids)) {
            return Excel::download(new UsersExport($ids), 'users.xlsx');
        }

        return redirect()->back()->with('error', 'No users selected for export.');
    }
}
