@extends('admin.layouts.app')

@section('title', 'projects')

@section('content')
<section class="content">
    <form action="{{route ('multipleSelection') }}" method="POST" id="multipleSelectionForm"
        enctype="multipart/form-data">
        @csrf

        <input id="action" type="hidden" name="action">
        <input id="page" type="hidden" name="page" value="projects">

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="box-title">Projects Table</h3>
                            </div>
                            <div class="col-md-6 text-right">
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle btn btn-primary" data-toggle="dropdown">
                                        Actions
                                    </a>
                                    <ul class="dropdown-menu actions-dropdown">
                                        <li>
                                            <a href="{{ route('projects.new') }}">
                                                New Project
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
                                    <th>User</th>
                                    <th>Status</th>
                                    <th>Delivery Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($projects as $project)
                                <tr>
                                    <td><input type="checkbox" class="row-checkbox" name="ids[]"
                                            value="{{ $project->id }}"></td>
                                    <td>{{ ucwords($project->name) }}</td>
                                    <td>{{ ucwords($project->user->name) }}</td>
                                    <td>{{ ucwords($project->status) }}</td>
                                    <td>{{ ucwords($project->delivery_date) }}</td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="{{ route('projects.images', $project->id) }}"
                                                class="btn btn-primary">
                                                <i class="fas fa-image"></i>
                                            </a>
                                            <a href="{{ route('projects.edit', $project->id) }}"
                                                class="btn btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            @if ($project->can_delete())
                                            <a href="{{ route('projects.destroy', $project->id) }}"
                                                class="btn btn-danger show_confirm" data-toggle="tooltip"
                                                data-original-title="Delete Project">
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