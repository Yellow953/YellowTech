@extends('admin.layouts.app')

@section('title', 'users')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="box-title">Users Table</h3>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ route('users.create') }}">
                                <button class="btn btn-primary">Add User</button>
                            </a>
                        </div>
                    </div>
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
                                <td>
                                    <div class="actions-buttons">
                                        <a href="{{ route('users.edit', ['user' => $user->id]) }}"><button
                                                class="btn btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </a>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger show_confirm"
                                                data-toggle="tooltip" data-original-title="Delete user">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->
@endsection