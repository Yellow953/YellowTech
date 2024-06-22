@extends('admin.layouts.app')

@section('title', 'invoices')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="box-title">Invoices Table</h3>
                        </div>
                        <div class="col-md-6 text-right">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                  Actions
                                  <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                  <li><a href="#" id="deleteSelected">Delete</a></li>
                                  <li>  <a href="{{ route('invoices.new') }}" >
                                    Add
                                 </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped text-center border">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="checkAll"></th>
                                <th>Invoice Number</th>
                                <th>User</th>
                                <th>Date</th>
                                <th>Currency</th>
                                <th>Status</th>
                                <th>Total Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($invoices as $invoice)
                            <tr>
                                <td><input type="checkbox" class="row-checkbox" data-id="{{ $invoice->id }}"></td>
                                <td>{{ $invoice->invoice_number }}</td>
                                <td>
                                    {{ ucwords($invoice->user->name) }} <br>
                                </td>
                                <td>{{ $invoice->date }}</td>
                                <td>{{ $invoice->currency }}</td>
                                <td><span class="status {{ $invoice->status == 'completed' ? 'completed' : '' }}">{{
                                        ucwords($invoice->status) }}</span></td>
                                <td>{{ number_format($invoice->total_price, 2) }}</td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('invoices.show', $invoice->id) }}" class="btn btn-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('invoices.edit', $invoice->id) }}" class="btn btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('invoices.destroy', $invoice->id) }}" method="GET">
                                            @csrf
                                            <button type="submit" class="btn btn-danger show_confirm"
                                                data-toggle="tooltip" data-original-title="Delete invoice">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
