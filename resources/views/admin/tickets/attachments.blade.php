@extends('admin.layouts.app')

@section('title', 'tickets')

@section('sub-title', 'attachments')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 col-md-8 offset-md-2">
            <div class="card m-3">
                <div class="card-header">
                    <h3 class="font-weight-bolder text-center my-2">Attachments</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="col-4">Attachment</th>
                                <th class="col-4">Name</th>
                                <th class="col-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($ticket->attachments as $attachment)
                            <tr>
                                <td class="col-4">
                                    @php
                                    $extension = pathinfo($attachment->path, PATHINFO_EXTENSION);
                                    @endphp
                                    @if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                                    <img src="{{ asset($attachment->path) }}"
                                        alt="{{ asset('assets/images/unknown_file.png') }}" class="img-fluid m-1"
                                        style="width:100px; height:100px">
                                    @else
                                    <img src="{{ asset('assets/images/unknown_file.png') }}" alt="Unknown File"
                                        class="img-fluid m-1" style="width:100px; height:100px">
                                    @endif
                                </td>
                                <td class="col-4">{{ pathinfo($attachment->path, PATHINFO_FILENAME) }}</td>
                                <td class="col-4">
                                    <div class="d-flex">
                                        <a href="{{ route('attachments.download', $attachment->id) }}"
                                            class="m-1 btn btn-primary"><i class="fa-solid fa-download"></i></a>
                                        <a href="{{ route('attachments.destroy', $attachment->id) }}"
                                            class="m-1 btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center">No attachments for this ticket...</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{-- <div class="d-flex justify-content-center">
                        @forelse ($ticket->attachments as $attachment)
                        <a class="image-wrapper" href="{{ route('attachments.destroy', $attachment->id) }}">

                            <span class="delete-overlay text-danger">Delete</span>
                        </a>
                        @empty
                        No Attachments yet...
                        @endforelse
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection