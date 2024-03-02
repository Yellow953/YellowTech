@extends('admin.layouts.app')

@section('content')
<!-- Main content -->
<section class="content content-center">
  <div class="row">
    <!-- left column -->
    <div class="col-md-6">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Add a new user</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="POST" action="{{ route('users.store') }}">
          @csrf
          @if ($errors->any())
          <div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
          <div class="box-body">
            <div class="form-group">
              <label for="name">Name</label>
              <input name="name" type="text" class="form-control" placeholder="Enter your name">
            </div>
            <div class="form-group">
              <label for="email">Email address</label>
              <input name="email" type="email" class="form-control" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input name="password" type="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
              <label for="password_confirmation">Password Confirmation</label>
              <input name="password_confirmation" type="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
              <label for="phone">Phone Number</label>
              <input type="tel" name="phone" class="form-control" id="phone" placeholder="Enter phone number">
            </div>
            <div class="checkbox">
              <label>
                <input name="role" type="checkbox"> Admin
              </label>
            </div>
          </div><!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div><!-- /.box -->
    </div>

    <!--/.col (right) -->
  </div> <!-- /.row -->
</section><!-- /.content -->
@endsection
