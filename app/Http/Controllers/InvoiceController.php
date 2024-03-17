<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::all();
        return view('admin.invoices.index', compact('invoices'));
    }

    public function new()
    {
        return view('admin.invoices.new');
    }

    public function create(Request $request)
    {
        $request->validate([
            'invoice_number' => 'required|string',
            'date' => 'required|date',
            'due_date' => 'nullable|date',
            'currency' => 'required|string',
            'rate' => 'required|numeric',
            'project_id' => 'required|exists:projects,id',
            'client_id' => 'required|exists:clients,id',
            'status' => 'required|string',
            'total_price' => 'required|numeric',
            'note' => 'nullable|string',
        ]);

        Invoice::create($request->all());

        return redirect()->route('invoices')->with('success', 'Invoice created successfully.');
    }

    public function edit(Invoice $invoice)
    {
        return view('admin.invoices.edit', compact('invoice'));
    }

    public function update(Request $request, Invoice $invoice)
    {
        $request->validate([
            'invoice_number' => 'required|string',
            'date' => 'required|date',
            'due_date' => 'nullable|date',
            'currency' => 'required|string',
            'rate' => 'required|numeric',
            'project_id' => 'required|exists:projects,id',
            'client_id' => 'required|exists:clients,id',
            'status' => 'required|string',
            'total_price' => 'required|numeric',
            'note' => 'nullable|string',
        ]);

        $invoice->update($request->all());

        return redirect()->route('invoices')->with('success', 'Invoice updated successfully.');
    }

    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->route('invoices')->with('success', 'Invoice deleted successfully.');
    }
}
