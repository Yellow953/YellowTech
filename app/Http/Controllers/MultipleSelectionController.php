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

        if ($ids && is_array($ids)) {
            Product::whereIn('id', $ids)->delete();
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
            Order::whereIn('id', $ids)->delete();
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
            Promo::whereIn('id', $ids)->delete();
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
            Project::whereIn('id', $ids)->delete();
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
            Invoice::whereIn('id', $ids)->delete();
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
            Ticket::whereIn('id', $ids)->delete();
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
            User::whereIn('id', $ids)->delete();
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

