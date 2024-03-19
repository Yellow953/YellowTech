@extends('admin.layouts.app')

@section('title', 'clients')

@section('sub-title', 'new')

@section('content')
<!-- Main content -->
<section class="content content-center">
    <!-- general form elements -->
    <form role="form" method="POST" action="{{ route('clients.store') }}">
        @csrf
        <div class="box box-primary">
            <div class="box-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="box-title">Add a new client</h3>
                    </div>

                </div><!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input name="name" type="text" class="form-control" placeholder="Enter client name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input name="email" type="email" class="form-control" placeholder="Enter email">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input name="address" type="text" class="form-control" placeholder="Enter address">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control">
                                <option value="done">Done</option>
                                <option value="pending">Pending</option>
                                <option value="ongoing">Ongoing</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="action">Action</label>
                            <input name="action" type="text" class="form-control" placeholder="Enter the action needed">
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div><!-- /.box-body -->
    </form>
    </div><!-- /.box -->
</section><!-- /.content -->
@endsection
