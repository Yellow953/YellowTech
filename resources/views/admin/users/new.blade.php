@extends('admin.layouts.app')

@section('title', 'users')

@section('sub-title', 'new')

@section('content')
<section class="content content-center">
  <div class="box box-primary">
    <div class="box-header">
      <h2 class="my-0 mb-3">Add User</h2>

      <div class="box-body">
        <form method="POST" action="{{ route('users.create') }}" enctype="multipart/form-data">
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
              <input name="email" type="email" class="form-control" placeholder="Enter email" value="{{ old('email') }}"
                required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="password">Password *</label>
              <input name="password" type="password" class="form-control" placeholder="Password" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="password_confirmation">Password Confirmation *</label>
              <input name="password_confirmation" type="password" class="form-control" placeholder="Password" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="phone">Phone Number *</label>
              <input type="tel" name="phone" class="form-control" id="phone" placeholder="Enter phone number" required
                value="{{ old('phone') }}">
            </div>
          </div>
          <div class="col-md-6">
            <div class="checkbox">
              <label>
                <input name="role" type="checkbox" {{ old('role') ? 'checked' : '' }}>Admin
              </label>
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