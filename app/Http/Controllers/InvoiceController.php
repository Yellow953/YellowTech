<?php

namespace App\Http\Controllers;

use App\Mail\InvoiceMailer;
use App\Models\User;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Log;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('show');
    }

    public function index()
    {
        $invoices = Invoice::select('id', 'invoice_number', 'date', 'user_id', 'currency', 'project_id', 'status', 'total_price')->orderBy('id', 'desc')->get();
        return view('admin.invoices.index', compact('invoices'));
    }

    public function new()
    {
        $projects = Project::select('id', 'name')->get();
        $users = User::select('id', 'name')->get();
        return view('admin.invoices.new', compact('projects', 'users'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'due_date' => 'nullable|date',
            'currency' => 'required|string',
            'rate' => 'required|numeric|min:0',
            'project_id' => 'required|exists:projects,id',
            'user_id' => 'required|exists:users,id',
            'status' => 'required|string',
            'note' => 'nullable|string',
        ]);

        $invoice = Invoice::create([
            'invoice_number' => Invoice::generate_number(),
            'date' => $request->date,
            'due_date' => $request->due_date,
            'currency' => $request->currency,
            'user_id' => $request->input('user_id'),
            'project_id' => $request->input('project_id'),
            'rate' => $request->rate,
            'status' => $request->status,
            'sub_total' => 0,
            'total_price' => 0,
            'discount' => $request->discount,
            'note' => $request->note,
        ]);

        $total_price = 0;
        foreach ($request->input('item') as $key => $item) {
            $tp = $request->input('quantity')[$key] * $request->input('unit_price')[$key];

            InvoiceItem::create([
                'invoice_id' => $invoice->id,
                'item' => $item,
                'quantity' => $request->input('quantity')[$key],
                'unit_price' => $request->input('unit_price')[$key],
                'total_price' => $tp,
            ]);
            $total_price += $tp;
        }

        $subtotal = $total_price;
        if ($request->discount != 0) {
            $total_price = $total_price - ($total_price * ($request->discount / 100));
        }

        $invoice->update([
            'total_price' => $total_price,
            'sub_total' => $subtotal,
        ]);

        $text = ucwords(auth()->user()->name) . " created new Invoice : " . $invoice->invoice_number . ", datetime :   " . now();
        Log::create(['text' => $text]);

        return redirect()->route('invoices')->with('success', 'Invoice created successfully!');
    }

    public function edit(Invoice $invoice)
    {
        $users = User::select('id', 'name')->get();
        $projects = Project::select('id', 'name')->get();
        $data = compact('users', 'projects', 'invoice');

        return view('admin.invoices.edit', $data);
    }

    public function update(Request $request, Invoice $invoice)
    {
        $request->validate([
            'date' => 'required|date',
            'due_date' => 'nullable|date',
            'currency' => 'required|string',
            'rate' => 'required|numeric|min:0',
            'project_id' => 'required|exists:projects,id',
            'user_id' => 'required|exists:users,id',
            'status' => 'required|string',
            'note' => 'nullable|string',
        ]);

        $invoice->update([
            'date' => $request->date,
            'due_date' => $request->due_date,
            'currency' => $request->currency,
            'user_id' => $request->input('user_id'),
            'project_id' => $request->input('project_id'),
            'rate' => $request->rate,
            'status' => $request->status,
            'discount' => $request->discount,
            'note' => $request->note,
        ]);

        foreach ($request->input('item') as $key => $item) {
            if ($item != '') {
                $tp = $request->input('quantity')[$key] * $request->input('unit_price')[$key];

                InvoiceItem::create([
                    'invoice_id' => $invoice->id,
                    'item' => $item,
                    'quantity' => $request->input('quantity')[$key],
                    'unit_price' => $request->input('unit_price')[$key],
                    'total_price' => $tp,
                ]);
            }
        }

        $total_price = 0;
        foreach ($invoice->items as $item) {
            $total_price += $item->total_price;
        }

        $subtotal = $total_price;
        if ($request->discount != 0) {
            $total_price = $total_price - ($total_price * ($request->discount / 100));
        }

        $invoice->update([
            'total_price' => $total_price,
            'sub_total' => $subtotal,
        ]);

        $text = ucwords(auth()->user()->name) . " updated Invoice : " . $invoice->invoice_number . ", datetime :   " . now();
        Log::create(['text' => $text]);

        return redirect()->route('invoices')->with('warning', 'Invoice updated successfully!');
    }

    public function destroy(Invoice $invoice)
    {
        $text = ucwords(auth()->user()->name) . " deleted Invoice : " . $invoice->invoice_number . ", datetime :   " . now();

        Log::create(['text' => $text]);
        $invoice->delete();

        return redirect()->back()->with('danger', 'Invoice deleted successfully!');
    }

    public function show(Invoice $invoice)
    {
        return view('admin.invoices.show', compact('invoice'));
    }

    public function invoice_item_destroy(InvoiceItem $invoice_item)
    {
        $text = ucwords(auth()->user()->name) . " deleted Invoice Item : " . $invoice_item->item . " in Invoice: " . $invoice_item->invoice->invoice_number . ", datetime :   " . now();
        Log::create(['text' => $text]);

        $invoice_item->delete();

        return redirect()->back()->with('success', 'Invoice email sent successfully.');
    }

    public function send(Invoice $invoice)
    {
        $mailer = new InvoiceMailer($invoice);
        Mail::to($invoice->user->email)->send($mailer);

        $text = ucwords(auth()->user()->name) . " sent Invoice : " . $invoice->invoice_number . " to " . $invoice->user->name . ", datetime :   " . now();
        Log::create(['text' => $text]);

        return redirect()->back()->with('success', 'Invoice email sent successfully.');
    }

    public function generate(Invoice $invoice)
    {
        // TODO: GENERATE PDF
    }
}
