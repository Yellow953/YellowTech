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
                            <a href="{{ route('invoices.new') }}" class="btn btn-primary">
                                <span><i class="fa fa-plus"></i></span>
                                Invoice
                            </a>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped text-center border">
                        <thead>
                            <tr>
                                <th>Invoice Number</th>
                                <th>Client</th>
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
                                <td>{{ $invoice->invoice_number }}</td>
                                <td>
                                    {{ ucwords($invoice->client->name) }} <br>
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