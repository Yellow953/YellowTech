@extends('admin.layouts.app')

@section('title', 'projects')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="box-title">Projects Table</h3>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ route('projects.new') }}" class="btn btn-primary">
                                <span><i class="fa fa-plus"></i></span>
                                Project
                            </a>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped text-center border">
                        <thead>
                            <tr>
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
                                <td>{{ ucwords($project->name) }}</td>
                                <td>{{ ucwords($project->user->name) }}</td>
                                <td>{{ ucwords($project->status) }}</td>
                                <td>{{ ucwords($project->delivery_date) }}</td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('projects.images', $project->id) }}" class="btn btn-primary">
                                            <i class="fas fa-image"></i>
                                        </a>
                                        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('projects.destroy', $project->id) }}" method="GET">
                                            @csrf
                                            <button type="submit" class="btn btn-danger show_confirm"
                                                data-toggle="tooltip" data-original-title="Delete project">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
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
</section>
@endsection