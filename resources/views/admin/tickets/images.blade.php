@extends('admin.layouts.app')

@section('title', 'tickets')

@section('sub-title', 'images')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 col-md-8 offset-md-2">
            <div class="card m-3">
                <div class="card-header">
                    <h4 class="font-weight-bolder text-center">Attachements<small class="mx-3 text-danger">
                            (click to remove)</small></h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        @forelse ($ticket->images as $attachement)
                        <form method="GET" action="{{ route('attachements.destroy', $attachement->id) }}">
                            @csrf
                            <a class="image-wrapper show_confirm">
                                <img src="{{asset($attachement->path)}}" alt="" class="img-fluid m-1"
                                    style="width:150px; height:150px">
                                <span class="delete-overlay text-danger">Delete</span>
                            </a>
                        </form>
                        @empty
                        No Attachements yet...
                        @endforelse
                    </div>
                </div>
            </div>
            <br>

            <div class="card m-3">
                <div class="card-header">
                    <h4 class="font-weight-bolder text-center">New Attachement</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('attachements.create') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">

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
        </div>
    </div>
</div>
@endsection