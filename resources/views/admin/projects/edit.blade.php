@extends('admin.layouts.app')

@section('title', 'projects')

@section('sub-title', 'edit')

@section('content')
<section class="content content-center">
    <div class="box box-primary">
        <div class="box-header">
            <h2 class="my-0 mb-3">Edit Project</h2>

            <div class="box-body">
                <form method="POST" action="{{ route('projects.update', $project->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name *</label>
                                <input name="name" type="text" class="form-control" placeholder="Enter your name"
                                    required value="{{ $project->name }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user_id">User *</label>
                                <select name="user_id" class="form-control select2" required>
                                    <option value=""></option>
                                    @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ $project->user_id==$user->id ? 'selected' :
                                        '' }}>{{ ucwords($user->name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Status *</label>
                                <select name="status" class="form-control select2" required>
                                    <option value=""></option>
                                    @foreach (Helper::get_project_statuses() as $status)
                                    <option value="{{ $status }}" {{ $project->status==$status ? 'selected' : '' }}>{{
                                        ucwords($status) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="delivery_date">Delivery Date</label>
                                <input name="delivery_date" type="date" class="form-control"
                                    value="{{ $project->delivery_date }}">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" placeholder="Project Description"
                                    style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $project->description }}</textarea>
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