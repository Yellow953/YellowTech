@extends('admin.layouts.app')

@section('title', 'clients')

@section('sub-title', 'new')

@section('content')
<section class="content content-center">
    <div class="box box-primary">
        <div class="box-header">
            <h2 class="my-0 mb-3">Add Client</h2>

            <div class="box-body">
                <form method="POST" action="{{ route('clients.create') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name *</label>
                            <input name="name" type="text" class="form-control" placeholder="Enter your name" required
                                value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email address *</label>
                            <input name="email" type="email" class="form-control" placeholder="Enter email"
                                value="{{ old('email') }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone">Phone Number *</label>
                            <input type="tel" name="phone" class="form-control" id="phone"
                                placeholder="Enter phone number" required value="{{ old('phone') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="city">City *</label>
                            <input type="text" name="city" class="form-control" id="city" placeholder="Enter City"
                                required value="{{ old('city') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address">Address *</label>
                            <input type="text" name="address" class="form-control" id="address"
                                placeholder="Enter Address" required value="{{ old('address') }}">
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