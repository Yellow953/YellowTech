@extends('admin.layouts.app')

@section('title', 'todo')

@section('sub-title', 'edit')

@section('content')
<form method="POST" action="{{ route('todo.update', $todo->id) }}" class="row-1 g-3 p-5" enctype="multipart/form-data">
    @csrf
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <!-- Edit To-Do Form -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Edit To-Do</h3>
                    </div>
                    <div class="box-body">
                        <!-- Added padding to the box body -->
                        <div class="form-group">
                            <label for="text">To-Do Text</label>
                            <input value="{{ $todo->text }}" name="text" type="text" class="form-control"
                                placeholder="Edit the to-do text">
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control">
                                <option value="ongoing" {{ $todo->status === 'ongoing' ? 'selected' : '' }}>Ongoing
                                </option>
                                <option value="completed" {{ $todo->status === 'completed' ? 'selected' : ''
                                    }}>Completed
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="checkbox" name="public" {{ $todo->public ? 'checked' : '' }}
                            class="form-check">
                            <label for="public">Public</label>
                        </div>
                    </div> <!-- End of box body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-block btn-custom">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
@endsection
