@extends('admin.layouts.app')

@section('title', 'users')

@section('sub-title', 'new')

@section('content')
<!-- Main content -->
<section class="content content-center mt-75">
  <!-- general form elements -->
  <div class="box box-primary">
    <!-- form start -->
    <form role="form" method="POST" action="{{ route('users.store') }}">
      @csrf
      <div class="box-header">
        <div class="row">
          <div class="col-md-6">
            <h3 class="box-title">Add a new user</h3>
          </div>
          <div class="col-md-6 text-right">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div><!-- /.box-header -->

        <div class="box-body">
          <div class="col-md-6">
            <div class="form-group">
              <label for="name">Name</label>
              <input name="name" type="text" class="form-control" placeholder="Enter your name">
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
              <label for="password">Password</label>
              <input name="password" type="password" class="form-control" placeholder="Password">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="password_confirmation">Password Confirmation</label>
              <input name="password_confirmation" type="password" class="form-control" placeholder="Password">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="phone">Phone Number</label>
              <input type="tel" name="phone" class="form-control" id="phone" placeholder="Enter phone number">
            </div>
          </div>
          <div class="col-md-6">
            <div class="checkbox">
              <label>
                <input name="role" type="checkbox"> Admin
              </label>
            </div>
          </div>
        </div><!-- /.box-body -->
    </form>
  </div><!-- /.box -->
  </div>

  <!--/.col (right) -->
  </div> <!-- /.row -->
</section><!-- /.content -->
@endsection