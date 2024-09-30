@extends('admin.layouts.app')

@section('title', 'users')

@section('content')
<section class="content">
    <form action="{{route ('multipleSelection') }}" method="POST" id="multipleSelectionForm"
        enctype="multipart/form-data">
        @csrf

        <input id="action" type="hidden" name="action">
        <input id="page" type="hidden" name="page" value="users">

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="box-title">Users Table</h3>
                            </div>
                            <div class="col-md-6 text-right">
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle btn btn-primary" data-toggle="dropdown">
                                        Actions
                                    </a>
                                    <ul class="dropdown-menu actions-dropdown">
                                        <li>
                                            <a href="{{ route('users.new') }}">
                                                New User
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" id="exportSelected" onclick="setAction('export')">Export
                                                Selected</a>
                                        </li>
                                        <li>
                                            <a href="#" id="deleteSelected" onclick="setAction('delete')">Delete
                                                Selected</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped text-center border">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="checkAll"></th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Role</th>
                                    <th>Created at</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td><input type="checkbox" class="row-checkbox" name="ids[]"
                                            value="{{ $user->id }}"></td>
                                    <td>{{ ucwords($user->name) }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ ucwords($user->role) }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>
                                        <div class="action-buttons">
                                            @if ($user->role == 'client')
                                            <a href="{{ route('users.calls', $user->id) }}" class="btn btn-success">
                                                <i class="fas fa-phone"></i>
                                            </a>
                                            @endif
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            @if ($user->can_delete())
                                            <a href="{{ route('users.destroy', $user->id) }}"
                                                class="btn btn-danger show_confirm" data-toggle="tooltip"
                                                data-original-title="Delete User">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection