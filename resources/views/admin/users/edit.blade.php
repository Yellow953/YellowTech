@extends('admin.layouts.app')
@section('content')
<form method="POST" action="{{ route('users.update', ['user' => $user->id]) }}" class="row-1 g-3 p-5" enctype="multipart/form-data">
    @csrf
                    <section class="content">
                        <div class="row">
                          <div class="col-xs-12">

                    <div class="box">
                        <div class="box-header">
                          <h3 class="box-title">Edit User</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td><input name="name" type="text" value="{{ $user->name }}" required></td>
                                <td> <input type="text" name="email"  value="{{ $user->email }}" required></td>
                                <td> <input type="text" name="role" value="{{ $user->role }}" required></td>
                              </tr>
                              <tr>
                                <button type="submit" class="btn btn-primary m-2">Save Changes</button>
                              </tr>
                          </table>
                        </div><!-- /.box-body -->
                      </div><!-- /.box -->
                    </div><!-- /.col -->
                    </div><!-- /.row -->
                    </section><!-- /.content -->
                </form>
            </div>
        </div>
    </div>
@endsection
