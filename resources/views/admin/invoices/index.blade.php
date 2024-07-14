@extends('admin.layouts.app')

@section('title', 'invoices')

@section('content')
<section class="content">
    <form action="{{route ('multipleSelection') }}" method="POST" id="multipleSelectionForm"
        enctype="multipart/form-data">
        @csrf

        <input id="action" type="hidden" name="action">
        <input id="page" type="hidden" name="page" value="invoices">

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
                                    <a href="#" class="dropdown-toggle btn btn-primary" data-toggle="dropdown">
                                        Actions
                                    </a>
                                    <ul class="dropdown-menu actions-dropdown">
                                        <li>
                                            <a href="{{ route('invoices.new') }}">
                                                New Invoice
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" id="exportSelected" onclick="setAction('export')">Export
                                                Selected</a>
                                        </li>
                                        <li>
                                            <a href="#" id="deleteSelected" onclick="setAction('delete')">Delete
                                                Selected</a>
                                        </li>
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
                                    <td><input type="checkbox" class="row-checkbox" name="ids[]"
                                            value="{{ $invoice->id }}"></td>
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
                                            <a href="{{ route('invoices.show', $invoice->id) }}"
                                                class="btn btn-primary">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('invoices.edit', $invoice->id) }}"
                                                class="btn btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            @if($invoice->can_delete())
                                            <a href="{{ route('invoices.destroy', $invoice->id) }}"
                                                class="btn btn-danger show_confirm" data-toggle="tooltip"
                                                data-original-title="Delete Invoice">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                            @endif
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
    </form>
</section>
@endsection