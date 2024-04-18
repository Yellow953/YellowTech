@extends('admin.layouts.app')

@section('title', 'users')

@section('sub-title', 'new')

@section('content')
<section class="content content-center">
  <div class="box box-primary">
    <div class="box-header">
      <h2 class="my-0 mb-3">Edit User</h2>

      <div class="box-body">
        <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="name">Name *</label>
                <input name="name" type="text" class="form-control" placeholder="Enter your name" required
                  value="{{ $user->name }}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="email">Email address *</label>
                <input name="email" type="email" class="form-control" placeholder="Enter email"
                  value="{{ $user->email }}" required>
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
                <input name="password_confirmation" type="password" class="form-control"
                  placeholder="Password Confirmation">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="phone">Phone Number *</label>
                <input type="tel" name="phone" class="form-control" id="phone" placeholder="Enter phone number" required
                  value="{{ $user->phone }}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="checkbox">
                <label>
                  <input name="role" type="checkbox" {{ $user->role == 'admin' ? 'checked' : '' }}>Admin
                </label>
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