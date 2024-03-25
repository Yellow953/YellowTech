<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Log;
use App\Models\Project;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $invoices = Invoice::select('id', 'invoice_number', 'date', 'client_id', 'currency', 'project_id', 'status', 'total_price')->orderBy('id', 'desc')->get();
        return view('admin.invoices.index', compact('invoices'));
    }

    public function new()
    {
        $projects = Project::select('id', 'name')->get();
        $clients = Client::select('id', 'name')->get();
        return view('admin.invoices.new', compact('projects', 'clients'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'due_date' => 'nullable|date',
            'currency' => 'required|string',
            'rate' => 'required|numeric|min:0',
            'project_id' => 'required|exists:projects,id',
            'client_id' => 'required|exists:clients,id',
            'status' => 'required|string',
            'note' => 'nullable|string',
        ]);

        $invoice = Invoice::create([
            'invoice_number' => Invoice::generate_number(),
            'date' => $request->date,
            'due_date' => $request->due_date,
            'currency' => $request->currency,
            'client_id' => $request->input('client_id'),
            'project_id' => $request->input('project_id'),
            'rate' => $request->rate,
            'status' => $request->status,
            'total_price' => 0,
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

        $invoice->update(['total_price' => $total_price]);

        $text = ucwords(auth()->user()->name) . " created new Invoice : " . $invoice->invoice_number . ", datetime :   " . now();
        Log::create(['text' => $text]);

        return redirect()->route('invoices')->with('success', 'Invoice created successfully!');
    }

    public function edit(Invoice $invoice)
    {
        $clients = Client::select('id', 'name')->get();
        $projects = Project::select('id', 'name')->get();
        $data = compact('clients', 'projects', 'invoice');

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
            'client_id' => 'required|exists:clients,id',
            'status' => 'required|string',
            'note' => 'nullable|string',
        ]);

        $invoice->update([
            'date' => $request->date,
            'due_date' => $request->due_date,
            'currency' => $request->currency,
            'client_id' => $request->input('client_id'),
            'project_id' => $request->input('project_id'),
            'rate' => $request->rate,
            'status' => $request->status,
            'note' => $request->note,
        ]);

        $total_price = $invoice->total_price;
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
        $invoice->update(['total_price' => $total_price]);

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
}
