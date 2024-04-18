@extends('admin.layouts.app')

@section('title', 'clients')

@section('sub-title', 'edit')

@section('content')
<section class="content content-center">
    <div class="box box-primary">
        <div class="box-header">
            <h2 class="my-0 mb-3">Edit Client</h2>

            <div class="box-body">
                <form method="POST" action="{{ route('clients.update', $client->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name *</label>
                                <input name="name" type="text" class="form-control" placeholder="Enter your name"
                                    required value="{{ $client->name }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email address *</label>
                                <input name="email" type="email" class="form-control" placeholder="Enter email"
                                    value="{{ $client->email }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Phone Number *</label>
                                <input type="tel" name="phone" class="form-control" id="phone"
                                    placeholder="Enter phone number" required value="{{ $client->phone }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="city">City *</label>
                                <input type="text" name="city" class="form-control" id="city" placeholder="Enter City"
                                    required value="{{ $client->city }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="address">Address *</label>
                                <textarea name="address" class="form-control" id="address" rows="5"
                                    placeholder="Enter Address" required>{{ $client->address }}</textarea>
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