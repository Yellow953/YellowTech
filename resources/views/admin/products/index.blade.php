@extends('admin.layouts.app')

@section('title', 'products')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="box-title">Products Table</h3>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ route('products.new') }}" class="btn btn-primary">
                                <span><i class="fa fa-plus"></i></span>
                                Product
                            </a>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped text-center border">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Prices</th>
                                <th>Category</th>
                                <th>Condition</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{ ucwords($product->name) }}</td>
                                <td>{{ number_format($product->quantity, 2) }}</td>
                                <td>
                                    Cost: {{ number_format($product->unit_cost, 2) }} <br>
                                    Price: {{ number_format($product->unit_price, 2) }} <br>
                                    Compare: {{ number_format($product->compare_price, 2) }} <br>
                                </td>
                                <td>{{ ucwords($product->category->name) }}</td>
                                <td>{{ ucwords($product->condition) }}</td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('products.images', $product->id) }}" class="btn btn-primary">
                                            <i class="fas fa-image"></i>
                                        </a>
                                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="GET">
                                            @csrf
                                            <button type="submit" class="btn btn-danger show_confirm"
                                                data-toggle="tooltip" data-original-title="Delete product">
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