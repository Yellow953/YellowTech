@extends('admin.layouts.app')

@section('title', 'products')

@section('sub-title', 'new')

@section('content')
<section class="content content-center">
    <div class="box box-primary">
        <div class="box-header">
            <h2 class="my-0 mb-3">Add Product</h2>

            <div class="box-body">
                <form method="POST" action="{{ route('products.create') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name *</label>
                                <input name="name" type="text" class="form-control" placeholder="Enter your name"
                                    required value="{{ old('name') }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Category *</label>
                                <select name="category_id" class="form-control select2" required>
                                    <option value=""></option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id')==$category->id ?
                                        'selected' :
                                        '' }}>{{ ucwords($category->name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="quantity">Quantity *</label>
                                <input name="quantity" type="number" class="form-control"
                                    placeholder="Enter your Quantity" required min="1" step="1"
                                    value="{{ old('quantity') }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Condition *</label>
                                <select name="condition" class="form-control select2" required>
                                    <option value=""></option>
                                    @foreach (Helper::get_conditions() as $condition)
                                    <option value="{{ $condition }}" {{ old('condition')==$condition ? 'selected' : ''
                                        }}>{{
                                        ucwords($condition) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="unit_cost">Unit Cost *</label>
                                <input name="unit_cost" type="number" class="form-control"
                                    placeholder="Enter your unit cost" required min="1" step="0.01"
                                    value="{{ old('unit_cost') }}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="unit_price">Unit Price *</label>
                                <input name="unit_price" type="number" class="form-control"
                                    placeholder="Enter your unit price" required min="1" step="0.01"
                                    value="{{ old('unit_price') }}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="compare_price">Compare Price *</label>
                                <input name="compare_price" type="number" class="form-control"
                                    placeholder="Enter your compare price" required min="1" step="0.01"
                                    value="{{ old('compare_price') }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="textarea" name="description" placeholder="Product Description"
                                    style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('description') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input name="image" type="file" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="keywords">Keywords</label>
                                <input name="keywords" type="text" class="form-control"
                                    placeholder="Enter keywords, comma separated" value="{{ old('keywords') }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-block btn-custom">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection