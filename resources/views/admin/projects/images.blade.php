@extends('admin.layouts.app')

@section('title', 'projects')

@section('sub-title', 'images')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 col-md-8 offset-md-2">
            <div class="card m-3">
                <div class="card-header">
                    <h3 class="font-weight-bolder text-center my-2">New Attachment</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('attachments.create') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="project_id" value="{{ $project->id }}">

                        <div class="input-group input-group-outline row  my-1">
                            <label for="pictures" class="col-md-5 col-form-label text-md-end">{{ __('Pictures')
                                }}</label>

                            <div class="col-md-6">
                                <input id="pictures" class="form-control" name="images[]" type="file" multiple required>

                                @error('pictures')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-4">
                            <button type="submit" class="btn btn-info btn-block text-white">
                                {{ __('Upload') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card m-3">
                <div class="card-header">
                    <h3 class="font-weight-bolder text-center my-2">Attachments<small class="mx-3 text-danger">
                            (click to remove)</small></h3>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        @forelse ($project->images as $attachment)
                        <a class="image-wrapper" href="{{ route('attachments.destroy', $attachment->id) }}">
                            <img src="{{asset($attachment->path)}}" alt="" class="img-fluid m-1"
                                style="width:150px; height:150px">
                            <span class="delete-overlay text-danger">Delete</span>
                        </a>
                        @empty
                        No Attachments yet...
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection