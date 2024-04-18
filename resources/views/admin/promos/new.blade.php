@extends('admin.layouts.app')

@section('title', 'promos')

@section('sub-title', 'new')

@section('content')
<section class="content content-center">
    <div class="box box-primary">
        <div class="box-header">
            <h2 class="my-0 mb-3">Add Promo</h2>

            <div class="box-body">
                <form method="POST" action="{{ route('promos.create') }}" enctype="multipart/form-data">
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
                                <label for="value">Value *</label>
                                <input name="value" type="number" class="form-control" placeholder="Enter percentage"
                                    min="0" max="100" value="{{ old('value') }}" required>
                            </div>
                        </div>
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