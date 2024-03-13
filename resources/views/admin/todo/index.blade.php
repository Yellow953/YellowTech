@extends('admin.layouts.app')

@section('title', 'todo')

@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-7">
            <!-- To Do List -->
            <div class="box box-primary">
                <div class="box-header">
                    <i class="ion ion-clipboard"></i>
                    <h3 class="box-title">To Do List</h3>
                </div>
                <div class="box-body">
                    <form action="{{ route('todo.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="text" class="form-control" placeholder="New To-Do" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control">
                                <option value="done">Done</option>
                                <option value="pending">Pending</option>
                                <option value="ongoing">Ongoing</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Add To-Do</button>
                    </form>
                    <ul class="todo-list">
                        @foreach($todos as $todo)
                        <li>
                            <span class="handle">
                                <i class="fa fa-ellipsis-v"></i>
                                <i class="fa fa-ellipsis-v"></i>
                            </span>
                            <input type="checkbox" name="status" value="done" {{ $todo->status === 'done' ? 'checked' :
                            '' }}>
                            <span class="text {{ $todo->status === 'done' ? 'text-muted' : '' }}">{{ $todo->text
                                }}</span>
                            <span class="badge bg-secondary">{{ ucfirst($todo->status) }}</span>
                            <a href="{{route('todo.edit', $todo->id)}}">
                                <button class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></button>
                            </a>

                            <form action="{{ route('todo.destroy', $todo->id) }}" method="GET" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection