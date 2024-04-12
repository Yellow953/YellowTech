@extends('admin.layouts.app')

@section('title', 'tickets')

@section('sub-title', 'new')

@section('content')
<section class="content content-center">
  <div class="box box-primary">
    <div class="box-header">
      <h2 class="my-0 mb-3">Add Ticket</h2>

      <div class="box-body">
        <form method="POST" action="{{ route('tickets.create') }}" enctype="multipart/form-data">
          @csrf
          <div class="col-md-6">
            <div class="form-group">
              <label for="title">Ticket Name *</label>
              <input name="title" type="text" class="form-control" placeholder="Enter ticket name" required
                value="{{ old('title') }}">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="project_id">Project Name *</label>
              <select name="project_id" class="form-control" required>
                <option value=""></option>
                @foreach ($projects as $project)
                <option value="{{ $project->id }}" {{ old('project_id')==$project->id ? 'selected' :
                    '' }}>{{ ucwords($project->name) }}</option>
                @endforeach
            </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="description">Description *</label>
              <input type="text" name="description" class="form-control" id="description" placeholder="Enter ticket description" required
                value="{{ old('description') }}">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="status">Status *</label>
              <input type="text" name="status" class="form-control" id="status" placeholder="Enter ticket status" required
                value="{{ old('status') }}">
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
