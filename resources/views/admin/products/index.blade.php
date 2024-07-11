@extends('admin.layouts.app')

@section('title', 'products')

@section('content')
<section class="content">
    <form action="{{route ('multipleSelection') }}" method="POST" id="multipleSelectionForm"
        enctype="multipart/form-data">
        @csrf

        <input id="action" type="hidden" name="action">
        <input id="page" type="hidden" name="page" value="products">

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="box-title">Products Table</h3>
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
                                        <li><a href="{{ route('products.new') }}">
                                                New Product
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
                                    <td><input type="checkbox" class="row-checkbox" name="ids[]"
                                            value="{{ $product->id }}"></td>
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
                                            <a href="{{ route('products.images', $product->id) }}"
                                                class="btn btn-primary">
                                                <i class="fas fa-image"></i>
                                            </a>
                                            <a href="{{ route('products.edit', $product->id) }}"
                                                class="btn btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            @if ($product->can_delete())
                                            <form action="{{ route('products.destroy', $product->id) }}" method="GET">
                                                @csrf
                                                <button type="submit" class="btn btn-danger show_confirm"
                                                    data-toggle="tooltip" data-original-title="Delete product">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
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