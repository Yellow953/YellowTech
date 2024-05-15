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
                <label for="name">Name *</label>
                <input name="name" type="text" class="form-control" required value="{{ $ticket->name }}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="name">Email *</label>
                <input name="email" type="email" class="form-control" required value="{{ $ticket->email }}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="subject">Subject *</label>
                <input name="subject" type="text" class="form-control" placeholder="Enter subject" required
                  value="{{ $ticket->subject }}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="status">Status *</label>
                <select name="status" class="form-control select2" required>
                  <option value=""></option>
                  @foreach (Helper::get_project_statuses() as $status)
                  <option value="{{ $status }}" {{ $ticket->status==$status ? 'selected' : '' }}>{{
                    ucwords($status) }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label class="form-label" for="attachments">Attachments
                  <small>(Max:20MB, Screenshots/Images/File...)</small></label>
                <input type="file" id="attachments" name="attachments[]" class="form-control-file form-control"
                  multiple>
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