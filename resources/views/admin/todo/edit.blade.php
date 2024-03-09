@extends('admin.layouts.app')

@section('content')

<form method="POST" action="{{ route('todo.update', ['toDo' => $toDo->id]) }}" class="row-1 g-3 p-5" enctype="multipart/form-data">
    @csrf
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <!-- Edit To-Do Form -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Edit To-Do</h3>
                    <div class="col-md-6 text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                    <div class="form-group">
                        <label for="text">To-Do Text</label>
                        <input value="{{ $toDo->text }}" name="text" type="text" class="form-control" placeholder="Edit the to-do text">
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" class="form-control">
                            <option value="done" {{ $toDo->status === 'done' ? 'selected' : '' }}>Done</option>
                            <option value="pending" {{ $toDo->status === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="ongoing" {{ $toDo->status === 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                        </select>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div><!-- /.box -->
        </div>
    </div>
</section>
@endsection
