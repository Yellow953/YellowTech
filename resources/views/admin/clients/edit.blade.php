@extends('admin.layouts.app')

@section('title', 'clients')

@section('sub-title', 'edit')

@section('content')
<form method="POST" action="{{ route('clients.update', ['client' => $client->id]) }}" class="row-1 g-3 p-5"
    enctype="multipart/form-data">
    @csrf

    <section class="content content-center mt-75">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="box-title">Edit Clients</h3>
                    </div>
                    <div class="col-md-6 text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div><!-- /.box-header -->

                <!-- form start -->
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input value="{{ $client->name }}" name="name" type="text" class="form-control"
                                placeholder="Enter client name">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input value="{{ $client->email }}" name="email" type="email" class="form-control"
                                placeholder="Enter email">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input value="{{ $client->address }}" name="address" type="text" class="form-control"
                                placeholder="Enter address">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control">
                                <option value="done" {{ $client->status == 'done' ? 'selected' : '' }}>Done</option>
                                <option value="pending" {{ $client->status == 'pending' ? 'selected' : '' }}>Pending
                                </option>
                                <option value="ongoing" {{ $client->status == 'ongoing' ? 'selected' : '' }}>Ongoing
                                </option>
                            </select>
                        </div>
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
    </section><!-- /.content -->
</form>
@endsection