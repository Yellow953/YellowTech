@extends('admin.layouts.app')

@section('title', 'tickets')

@section('sub-title', 'new')

@section('content')
<section class="content content-center">
  <div class="box box-primary">
    <div class="box-header">
      <h2 class="my-0 mb-3">Edit Ticket</h2>

      <div class="box-body">
        <form method="POST" action="{{ route('tickets.update', $ticket->id) }}" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="title">Ticket Name *</label>
                <input name="title" type="text" class="form-control" placeholder="Enter your name" required
                  value="{{ $ticket->title }}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="project_id">Project Name: *</label>
                <select name="project_id" class="form-control select2" required>
                  <option value=""></option>
                  @foreach ($projects as $project)
                  <option value="{{ $project->id }}" {{ $project->project_id==$project->id ? 'selected' :
                    '' }}>{{ ucwords($project->name) }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="user_id">User Name: *</label>
                <select name="user_id" class="form-control select2" required>
                  <option value=""></option>
                  @foreach ($users as $user)
                  <option value="{{ $user->id }}" {{ $user->user_id==$user->id ? 'selected' :
                    '' }}>{{ ucwords($user->name) }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="status">Status *</label>
                <input type="text" name="status" class="form-control select2" id="status"
                  placeholder="Enter ticket status" required value="{{ $ticket->status }}">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="description">Description *</label>
                <textarea name="description" class="form-control" placeholder="Enter ticket description" rows="5"
                  required>{{ $ticket->description }}</textarea>
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