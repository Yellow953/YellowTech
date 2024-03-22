@extends('admin.layouts.app')

@section('title', 'clients')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="box-title">Clients Table</h3>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ route('clients.new') }}" class="btn btn-primary">
                                <span><i class="fa fa-plus"></i></span>
                                Client
                            </a>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped text-center border">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Created at</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($clients as $client)
                            <tr>
                                <td>{{ ucwords($client->name) }}</td>
                                <td>{{ $client->email }}</td>
                                <td>{{ $client->phone }}</td>
                                <td>{{ $client->city }}, {{ $client->address }}</td>
                                <td>{{ $client->created_at }}</td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('clients.destroy', $client->id) }}" method="GET">
                                            @csrf
                                            <button type="submit" class="btn btn-danger show_confirm"
                                                data-toggle="tooltip" data-original-title="Delete client">
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