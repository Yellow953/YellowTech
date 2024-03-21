@extends('admin.layouts.app')

@section('title', 'categories')

@section('sub-title', 'edit')

@section('content')
<section class="content content-center">
    <div class="box box-primary">
        <div class="box-header">
            <h2 class="my-0 mb-3">Edit Category</h2>

            <div class="box-body">
                <form method="POST" action="{{ route('categories.udpate', $category->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name *</label>
                            <input name="name" type="text" class="form-control" placeholder="Enter your name" required
                                value="{{ $category->name }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="description">Description *</label>
                            <input name="description" type="text" class="form-control" placeholder="Enter description"
                                value="{{ $category->description }}" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection