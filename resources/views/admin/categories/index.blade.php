@extends('admin.layouts.app')

@section('title', 'categories')

@section('content')
<section class="content">
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
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                  Actions
                                  <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                  <li><a href="#" id="deleteSelected">Delete</a></li>
                                  <li> <a href="{{ route('categories.new') }}">
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
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td><input type="checkbox" class="row-checkbox" data-id="{{ $category->id }}"></td>
                                <td>{{ ucwords($category->name) }}</td>
                                <td>{{ $category->description }}</td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('categories.destroy', $category->id) }}" method="GET" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-danger show_confirm" data-toggle="tooltip" data-original-title="Delete category">
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

<script>
    document.getElementById('checkAll').addEventListener('click', function() {
        let checkboxes = document.querySelectorAll('.row-checkbox');
        checkboxes.forEach(checkbox => checkbox.checked = this.checked);
    });

    document.getElementById('deleteSelected').addEventListener('click', function(e) {
        e.preventDefault();
        let selectedIds = Array.from(document.querySelectorAll('.row-checkbox:checked')).map(cb => cb.dataset.id);

        if (selectedIds.length > 0) {
            if (confirm('Are you sure you want to delete the selected categories?')) {
                fetch("{{ route('categories.bulkDelete') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ ids: selectedIds })
                }).then(response => response.json()).then(data => {
                    if (data.success) {
                        location.reload();
                    } else {
                        alert('An error occurred while deleting the categories.');
                    }
                });
            }
        } else {
            alert('Please select at least one category to delete.');
        }
    });
</script>
@endsection
