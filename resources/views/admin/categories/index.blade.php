@extends('admin.layouts.app')

@section('title', 'categories')

@section('content')

<section class="content">
    <form action="{{route ('multipleSelection') }}" method="POST" id="multipleSelectionForm"
        enctype="multipart/form-data">
        @csrf

        <input id="action" type="hidden" name="action">
        <input id="page" type="hidden" name="page" value="categories">

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="box-title">Categories Table</h3>
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
                                        <li><a href="{{ route('categories.new') }}">
                                                New Category
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
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($categories as $category)
                                <tr>
                                    <td><input type="checkbox" class="row-checkbox" name="ids[]"
                                            value="{{ $category->id }}"></td>
                                    <td>{{ ucwords($category->name) }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="{{ route('categories.edit', $category->id) }}"
                                                class="btn btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('categories.destroy', $category->id) }}" method="GET"
                                                class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-danger show_confirm"
                                                    data-toggle="tooltip" data-original-title="Delete category">
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
    </form>
</section>

@endsection