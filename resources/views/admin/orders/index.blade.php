@extends('admin.layouts.app')

@section('title', 'orders')

@section('content')
<section class="content">
    <form action="{{route ('multipleSelection') }}" method="POST" id="multipleSelectionForm"
        enctype="multipart/form-data">
        @csrf

        <input id="action" type="hidden" name="action">
        <input id="page" type="hidden" name="page" value="orders">

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="box-title">Orders Table</h3>
                            </div>
                            <div class="col-md-6 text-right">
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle btn btn-primary" data-toggle="dropdown">
                                        Actions
                                    </a>
                                    <ul class="dropdown-menu actions-dropdown">
                                        <li><a href="#" id="exportSelected" onclick="setAction('export')">Export
                                                Selected</a>
                                        </li>
                                        <li><a href="#" id="deleteSelected" onclick="setAction('delete')">Delete
                                                Selected</a>
                                        </li>
                                        <li><a href="{{ route('orders.new') }}">
                                                New Order
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
                                    <th>Order Number</th>
                                    <th>User</th>
                                    <th>Status</th>
                                    <th>Total Price</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td><input type="checkbox" class="row-checkbox" name="ids[]"
                                            value="{{ $order->id }}"></td>
                                    <td>{{ $order->id }}</td>
                                    <td>
                                        {{ ucwords($order->user->name) }} <br>
                                        {{ $order->user->email }} <br>
                                        {{ $order->user->phone }} <br>
                                    </td>
                                    <td><span class="status {{ $order->status == 'completed' ? 'completed' : '' }}">{{
                                            ucwords($order->status) }}</span></td>
                                    <td>{{ number_format($order->total_price, 2) }}</td>
                                    <td>
                                        <div class="action-buttons">
                                            @if($order->status != 'completed')
                                            <a href="{{ route('orders.complete', $order->id) }}"
                                                class="btn btn-success">
                                                <i class="fas fa-check"></i>
                                            </a>
                                            @endif

                                            <a href="{{ route('orders.show', $order->id) }}" class="btn btn-primary">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('orders.destroy', $order->id) }}" method="GET">
                                                @csrf
                                                <button type="submit" class="btn btn-danger show_confirm"
                                                    data-toggle="tooltip" data-original-title="Delete order">
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
    </form>
</section>
@endsection