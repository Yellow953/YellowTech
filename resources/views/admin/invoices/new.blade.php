@extends('admin.layouts.app')

@section('title', 'invoices')

@section('sub-title', 'new')

@section('content')

<div class="inner-container w-100 m-0 p-5">
    <div class="card">
        <div class="card-header bg-info border-b">
            <h4 class="font-weight-bolder">New Invoice</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('invoices.create') }}" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group input-group-outline row my-3">
                            <label for="user_id" class="col-md-3 col-form-label text-md-end">{{ __('User
                                *') }}</label>

                            <div class="col-md-9">
                                <select name="user_id" id="user_id" required class="form-control select2">
                                    <option value=""></option>
                                    @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ $user->id == old('user_id') ?
                                        'selected':'' }}>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-outline row my-3">
                            <label for="project_id" class="col-md-3 col-form-label text-md-end">{{ __('Project
                                *') }}</label>

                            <div class="col-md-9">
                                <select name="project_id" id="project_id" required class="form-control select2">
                                    <option value=""></option>
                                    @foreach ($projects as $project)
                                    <option value="{{ $project->id }}" {{ $project->id == old('project_id') ?
                                        'selected':'' }}>{{ $project->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group input-group-outline row my-3">
                            <label for="currency" class="col-md-3 col-form-label text-md-end">{{ __('Currency
                                *') }}</label>

                            <div class="col-md-9">
                                <select name="currency" id="currency" required class="form-control select2">
                                    <option value=""></option>
                                    @foreach (Helper::get_currencies() as $currency)
                                    <option value="{{ $currency }}" {{ $currency==old('currency') ? 'selected' :'' }}>{{
                                        $currency }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-outline row my-3">
                            <label for="rate" class="col-md-3 col-form-label text-md-end">{{
                                __('Rate') }}</label>

                            <div class="col-md-9">
                                <input id="rate" type="number" class="form-control @error('rate') is-invalid @enderror"
                                    name="rate" value="{{ old('rate') }}" min="0" step="any">

                                @error('rate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group input-group-outline row my-3">
                            <label for="date" class="col-md-3 col-form-label text-md-end">{{
                                __('Date *') }}</label>

                            <div class="col-md-9">
                                <input id="date" type="date" class=" form-control @error('date') is-invalid @enderror"
                                    name="date" required autocomplete="date" value="{{ old('date') ?? date('Y-m-d') }}">

                                @error('date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-outline row my-3">
                            <label for="due_date" class="col-md-3 col-form-label text-md-end">{{
                                __('Due Date *') }}</label>

                            <div class="col-md-9">
                                <input id="due_date" type="date"
                                    class=" form-control @error('due_date') is-invalid @enderror" name="due_date"
                                    required autocomplete="due_date" value="{{ old('due_date') ?? date('Y-m-d') }}">

                                @error('due_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group input-group-outline row my-3">
                            <label for="status" class="col-md-3 col-form-label text-md-end">{{ __('Status
                                *') }}</label>

                            <div class="col-md-9">
                                <select name="status" id="status" required class="form-control select2">
                                    <option value=""></option>
                                    @foreach (Helper::get_invoice_statuses() as $status)
                                    <option value="{{ $status }}" {{ $status==old('status') ? 'selected' :'' }}>{{
                                        $status }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-outline row my-3">
                            <label for="note" class="col-md-3 col-form-label text-md-end">{{
                                __('Note') }}</label>

                            <div class="col-md-9">
                                <textarea id="note" type="date"
                                    class=" form-control @error('note') is-invalid @enderror" rows="5"
                                    name="note">{{ old('note') }}</textarea>

                                @error('note')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <br><br>
                <h3 class="my-3">Invoice Items</h3>
                <br><br>
                <div class="w-100 my-3">
                    <table class="table table-bordered" id="invoiceItemsTable">
                        <thead>
                            <tr>
                                <th></th>
                                <th class="text-sm">Item</th>
                                <th class="text-sm">Quantity</th>
                                <th class="text-sm">Unit Price</th>
                                <th class="text-sm">Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="invoice-item-row">
                                <td>
                                    <button type="button" class="btn btn-info py-2 px-3"
                                        onclick="addInvoiceItemRow()"><i class="fa fa-plus"></i></button>
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="item[]" required>
                                </td>
                                <td>
                                    <input type="number" name="quantity[]" class="form-control" required min="1"
                                        value="1" step="any">
                                </td>
                                <td>
                                    <input type="number" name="unit_price[]" class="form-control" required min="0"
                                        value="0" step="any">
                                </td>
                                <td>
                                    <input type="number" name="total_price[]" class="form-control" required min="0"
                                        value="0" step="any" disabled>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row my-2">
                    <div class="offset-md-6 col-3">Discount %</div>
                    <div class="col-3"><input type="number" min="0" max="100" step="any" value="0" name="discount"
                            id="discount" class="form-control"></div>
                </div>
                <div class="row my-2">
                    <div class="offset-md-6 col-3">Total Price $</div>
                    <div class="col-3 text-right"><span id="invoice_items_total">0.00</span></div>
                </div>

                <br><br>
                <div class="w-100 my-3">
                    <button type="submit" class="btn btn-info btn-block btn-custom" id="submitBtn">
                        {{ __('Create') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function addInvoiceItemRow() {
        var table = document.getElementById("invoiceItemsTable").getElementsByTagName('tbody')[0];
        var newRow = table.insertRow(table.rows.length);
        var originalRow = document.querySelector('.invoice-item-row');

        newRow.innerHTML = originalRow.innerHTML;

        newRow.firstElementChild.innerHTML = '<button type="button" class="btn btn-danger py-2 px-3" onclick="removeRow(this)"><i class="fa fa-minus"></i></button>';

        newRow.querySelectorAll('input').forEach(function(input) {
            input.addEventListener('input', function() {
                updateInvoiceItemRow(newRow);
                updateInvoiceTotalWithDiscount();
            });
        });
    }

    function removeRow(button) {
        var row = button.parentNode.parentNode;
        row.parentNode.removeChild(row);
        updateInvoiceTotal();
        updateInvoiceTotalWithDiscount();
    }

    function updateInvoiceItemRow(row) {
        var quantity = parseFloat(row.querySelector('input[name^="quantity"]').value) || 0;
        var unitPrice = parseFloat(row.querySelector('input[name^="unit_price"]').value) || 0;
        
        var totalPrice = quantity * unitPrice;
        
        row.querySelector('input[name^="total_price"]').value = totalPrice.toFixed(2);
        
        updateInvoiceTotal();
    }
    
    function updateInvoiceTotal() {
        var total = 0;

        document.querySelectorAll('#invoiceItemsTable tbody tr').forEach(function(row) {
            var totalCost = parseFloat(row.querySelector('input[name^="total_price"]').value) || 0;
            
            total += totalCost;
        });

        document.getElementById('invoice_items_total').innerText = total.toFixed(2);
    }

    function updateInvoiceTotalWithDiscount() {
        var total = calculateTotal();
        var discount = parseFloat(document.getElementById('discount').value) || 0;
        var discountedTotal = total - (total * (discount / 100));

        document.getElementById('invoice_items_total').innerText = discountedTotal.toFixed(2);
    }

    function calculateTotal() {
        var total = 0;

        document.querySelectorAll('#invoiceItemsTable tbody tr').forEach(function(row) {
            var totalCost = parseFloat(row.querySelector('input[name^="total_price"]').value) || 0;
            total += totalCost;
        });

        return total;
    }

    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('#invoiceItemsTable tbody tr').forEach(function(row) {
            row.querySelectorAll('input').forEach(function(input) {
                input.addEventListener('input', function() {
                    updateInvoiceItemRow(row);
                    updateInvoiceTotalWithDiscount();
                });
            });
        });

        document.getElementById('discount').addEventListener('input', function() {
            updateInvoiceTotalWithDiscount();
        });

        updateInvoiceTotalWithDiscount();
    });
</script>
@endsection