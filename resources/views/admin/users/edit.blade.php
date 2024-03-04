@extends('admin.layouts.app')
@section('content')
<form method="POST" action="{{ route('users.update', ['user' => $user->id]) }}" class="row-1 g-3 p-5" enctype="multipart/form-data">
    @csrf

    <section class="content content-center">


          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="box-title">Edit User</h3>
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
                  <input value="{{$user->name}}" name="name" type="text" class="form-control" placeholder="Enter your name">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                  <label for="email">Email address</label>
                  <input  value="{{$user->email}}" name="email" type="email" class="form-control" placeholder="Enter email">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                  <label for="phone">Phone Number</label>
                  <input  value="{{$user->phone}}" type="tel" name="phone" class="form-control" id="phone" placeholder="Enter phone number">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="role">Role</label>
                    <input  value="{{$user->role}}" name="role" type="text" class="form-control" >
                  </div>
            </div>
              </div><!-- /.box-body -->

            </form>
          </div><!-- /.box -->

    </section><!-- /.content -->
    @endsection

