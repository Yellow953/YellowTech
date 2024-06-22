@extends('admin.layouts.app')

@section('title', 'promos')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="box-title">Promos Table</h3>
                        </div>
                        <div class="col-md-6 text-right">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                  Actions
                                  <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                  <li><a href="#" id="deleteSelected">Delete</a></li>
                                  <li>  <a href="{{ route('promos.new') }}">
                                    Add
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
                                <th>Name</th>
                                <th>Value</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($promos as $promo)
                            <tr>
                                <td><input type="checkbox" class="row-checkbox" data-id="{{ $promo->id }}"></td>
                                <td>{{ ucwords($promo->name) }}</td>
                                <td>{{ number_format($promo->value, 2) }}%</td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('promos.edit', $promo->id) }}" class="btn btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('promos.destroy', $promo->id) }}" method="GET">
                                            @csrf
                                            <button type="submit" class="btn btn-danger show_confirm"
                                                data-toggle="tooltip" data-original-title="Delete promo">
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
