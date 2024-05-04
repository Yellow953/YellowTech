@extends('admin.layouts.app')

@section('title', 'tickets')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="box-title">Tickets Table</h3>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ route('tickets.new') }}" class="btn btn-primary">
                                <span><i class="fa fa-plus"></i></span>
                                Ticket
                            </a>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped text-center border">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Project</th>
                                <th>Description</th>
                                <th>Subject</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tickets as $ticket)
                            <tr>
                                <td>{{ ucwords($ticket->title) }}</td>
                                <td>{{ $ticket->project->name }}</td>
                                <td>{{ $ticket->subject }}</td>
                                <td>{{ $ticket->description }}</td>
                                <td>{{ ucwords($ticket->status) }}</td>

                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('tickets.images', $ticket->id) }}" class="btn btn-primary">
                                            <i class="fas fa-image"></i>
                                        </a>
                                        <a href="{{ route('tickets.edit', $ticket->id) }}" class="btn btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('tickets.destroy', $ticket->id) }}" method="GET">
                                            @csrf
                                            <button type="submit" class="btn btn-danger show_confirm"
                                                data-toggle="tooltip" data-original-title="Delete ticket">
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
