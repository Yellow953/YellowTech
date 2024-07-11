@extends('admin.layouts.app')

@section('title', 'tickets')

@section('content')
<section class="content">
    <form action="{{route ('multipleSelection') }}" method="POST" id="multipleSelectionForm"
        enctype="multipart/form-data">
        @csrf

        <input id="action" type="hidden" name="action">
        <input id="page" type="hidden" name="page" value="tickets">

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="box-title">Tickets Table</h3>
                            </div>
                            <div class="col-md-6 text-right">
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle btn btn-primary" data-toggle="dropdown">
                                        Actions
                                    </a>
                                    <ul class="dropdown-menu actions-dropdown">
                                        <li><a href="#" id="exportSelected" onclick="setAction('export')">Export
                                                Selected</a>
                                        </li>
                                        <li><a href="#" id="deleteSelected" onclick="setAction('delete')">Delete
                                                Selected</a>
                                        </li>
                                        <li><a href="{{ route('tickets.new') }}">
                                                New Ticket
                                            </a></li>
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
                                    <th>User</th>
                                    <th>Subject</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tickets as $ticket)
                                <tr>
                                    <td><input type="checkbox" class="row-checkbox" name="ids[]"
                                            value="{{ $ticket->id }}"></td>
                                    <td>
                                        {{ ucwords($ticket->name) }} <br>
                                        {{ $ticket->email }}
                                    </td>
                                    <td>{{ ucwords($ticket->subject) }}</td>
                                    <td>{{ $ticket->description }}</td>
                                    <td>{{ ucwords($ticket->status) }}</td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="{{ route('tickets.attachments', $ticket->id) }}"
                                                class="btn btn-primary">
                                                <i class="fa-solid fa-paperclip"></i>
                                            </a>
                                            <a href="{{ route('tickets.edit', $ticket->id) }}" class="btn btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            @if ($ticket->can_delete())
                                            <form action="{{ route('tickets.destroy', $ticket->id) }}" method="GET">
                                                @csrf
                                                <button type="submit" class="btn btn-danger show_confirm"
                                                    data-toggle="tooltip" data-original-title="Delete ticket">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
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