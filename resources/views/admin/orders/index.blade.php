@extends('admin.layouts.app')

@section('title', 'orders')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="box-title">Orders Table</h3>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ route('orders.new') }}" class="btn btn-primary">
                                <span><i class="fa fa-plus"></i></span>
                                Order
                            </a>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped text-center border">
                        <thead>
                            <tr>
                                <th>Order Number</th>
                                <th>Client</th>
                                <th>Status</th>
                                <th>Total Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>
                                    {{ ucwords($order->client->name) }} <br>
                                    {{ $order->client->email }} <br>
                                    {{ $order->client->phone }} <br>
                                </td>
                                <td><span class="status {{ $order->status == 'completed' ? 'completed' : '' }}">{{
                                        ucwords($order->status) }}</span></td>
                                <td>{{ number_format($order->total_price, 2) }}</td>
                                <td>
                                    <div class="action-buttons">
                                        @if($order->status != 'completed')
                                        <a href="{{ route('orders.complete', $order->id) }}" class="btn btn-success">
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
</section>
@endsection