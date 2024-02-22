@extends('admin.layouts.app')

@section('content')
<section class="content">
    <div class="row">
      <div class="col-xs-12">

<div class="box">
    <div class="box-header">
      <h3 class="box-title">Users Table</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Created at</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
          <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
            <td>{{ $user->created_at }}</td>
            <td class="align-middle">
                <a href="javascript:;" class="text-secondary font-weight-bold text-xs m-2" data-toggle="tooltip"
                  data-original-title="Delete user"
                  onclick="event.preventDefault(); document.getElementById('delete-form-{{ $user->id }}').submit();">
                  Delete
                </a>
                <!-- Delete Form -->
                <form id="delete-form-{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}"
                  method="POST" style="display: none;">
                  @csrf
                  @method('DELETE')
                </form>
                <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="text-secondary font-weight-bold text-xs m-2">
                  - Edit
                </a>
              </td>
            </tr>
         @endforeach
         <tr>
            <td colspan="5" class="text-center">
                <a href="{{route('users.create')}}" >
              <button type="button" class="btn btn-primary" >
                add user
              </button>
            </a>
            </td>
          </tr>
      </table>
    </div><!-- /.box-body -->
  </div><!-- /.box -->
</div><!-- /.col -->
</div><!-- /.row -->
</section><!-- /.content -->
@endsection
