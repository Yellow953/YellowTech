    @extends('layouts.app')
    @section('content')
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <img src="assets/images/login.jpg" alt="login" class="login-card-img">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <div class="brand-wrapper">
                               <img src="{{ asset('assets/logo/logo_Y_vector.png') }}" alt="logo" class="logo" />
                            </div>
                            <p class="login-card-description">Create Ticket</p>
                            <form method="POST" action="{{ route('ticket.create') }}" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="title">Ticket Name *</label>
                <input name="title" type="text" class="form-control" placeholder="Enter ticket name" required
                  value="{{ old('title') }}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="user_id">User Name *</label>
                <select name="user_id" class="form-control select2" required>
                  <option value=""></option>
                  @foreach ($users as $user)
                  <option value="{{ $user->id }}" {{ old('project_id')==$user->id ? 'selected' :
                    '' }}>{{ ucwords($user->name) }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="project_id">Project Name *</label>
                <select name="project_id" class="form-control select2" required>
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
                <label for="status">Status *</label>
                <select name="status" class="form-control select2" required>
                  <option value=""></option>
                  @foreach (Helper::get_project_statuses() as $status)
                  <option value="{{ $status }}" {{ old('status')==$status ? 'selected' : '' }}>{{
                    ucwords($status) }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="description">Description *</label>
                <textarea name="description" class="form-control" id="description" rows="5"
                  placeholder="Enter ticket description" required>{{ old('description') }}</textarea>
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
            </div>
        </div>
    </main>
    @endsection