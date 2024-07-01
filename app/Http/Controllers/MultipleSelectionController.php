<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\Invoice;
use App\Models\Ticket;
use App\Models\Project;
use App\Models\Promo;
use App\Models\User;
use Illuminate\Http\Request;

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
            Category::whereIn('id', $ids)->delete();
        }

        return;
    }

    private function exportCategories($request)
    {
        return;
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
        return;
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
        return;
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
        return;
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
        return;
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
        return;
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
        return;
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
        return;
    }
}
