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
                            <form action="{{route ('multipleSelection') }}" method="POST" id="multipleSelectionForm" enctype="multipart/form-data">
                                @csrf
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                  Actions
                                  <span class="caret"></span>
                                </button>

                                    <input id="action" type="hidden" name="action">
                                    <input id="page" type="hidden" name="page" value="categories">
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <li><a href="#" id="exportSelected" onclick="setAction('export')" >Export</a></li>
                                    <li><a href="#" id="deleteSelected" onclick="setAction('delete')">Delete</a></li>
                                    <li><a href="{{ route('categories.new') }}">
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
                                <th><input type="checkbox" id="checkAllOne"></th>
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
                            </form>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    // Start multiple selection form
function setAction(action){
    var form = document.getElementById('multipleSelectionForm');
    var actionInput = document.getElementById('action');
    actionInput.value = action;
    form.submit();
}

document.getElementById('checkAllOne').addEventListener('click', function() {
    let checkboxes = document.querySelectorAll('.row-checkbox');
    checkboxes.forEach(checkbox => checkbox.checked = this.checked);
});
// End multiple selection form

</script>
@endsection
