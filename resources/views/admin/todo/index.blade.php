@extends('admin.layouts.app')

@section('title', 'todo')

@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- To Do List -->
        <div class="col-lg-6">
            <div class="box box-primary">
                <div class="box-header">
                    <i class="ion ion-clipboard"></i>
                    <h3 class="box-title">Ongoing Tasks</h3>
                </div>
                <div class="box-body">
                    <ul class="todo-list">
                        @forelse($ongoing_todos as $todo)
                        <li>
                            <span class="text text-muted">
                                @if ($todo->user_id != auth()->user()->id)
                                <b class="text-dark">{{ ucwords($todo->user->name) }}</b> (Public)<br>
                                @endif
                                {{ $todo->text}}</span>

                            <div class="tools">
                                <form action="{{ route('todo.complete', $todo->id) }}" method="GET"
                                    style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-xs btn-success"><i
                                            class="fa fa-check"></i></button>
                                </form>
                                <a href="{{ route('todo.edit', $todo->id) }}">
                                    <button class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></button>
                                </a>
                                <form action="{{ route('todo.destroy', $todo->id) }}" method="GET"
                                    style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-xs btn-danger" style="margin-right: 5px;"><i
                                            class="fa fa-trash"></i></button>
                                </form>
                            </div>
                        </li>
                        @empty
                        <li>No Tasks Yet...</li>
                        @endforelse
                        <li><span>{{ $ongoing_todos->links() }}</span></li>
                        <br>
                    </ul>
                </div>
            </div>

            <div class="box box-primary">
                <div class="box-header">
                    <i class="ion ion-clipboard"></i>
                    <h3 class="box-title">Completed Tasks</h3>
                </div>
                <div class="box-body">
                    <ul class="todo-list">
                        @forelse($completed_todos as $todo)
                        <li>
                            <span class="text text-muted">
                                @if ($todo->user_id != auth()->user()->id)
                                <b class="text-dark">{{ ucwords($todo->user->name) }}</b> (Public)<br>
                                @endif
                                {{ $todo->text}}</span>

                            <div class="tools">
                                <a href="{{ route('todo.edit', $todo->id) }}">
                                    <button class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></button>
                                </a>
                                <form action="{{ route('todo.destroy', $todo->id) }}" method="GET"
                                    style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-xs btn-danger" style="margin-right: 5px;"><i
                                            class="fa fa-trash"></i></button>
                                </form>
                            </div>
                        </li>
                        @empty
                        <li>No Tasks Yet...</li>
                        @endforelse
                        <li><span>{{ $ongoing_todos->links() }}</span></li>
                        <br>
                    </ul>
                </div>
            </div>
        </div>

        <!-- To Do Form -->
        <div class="col-lg-6">
            <div class="box box-primary">
                <div class="box-header">
                    <i class="ion ion-compose"></i>
                    <h3 class="box-title">Create Todo</h3>
                </div>
                <div class="box-body">
                    <form action="{{ route('todo.create') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="text" class="form-control" placeholder="Create a Todo ..."
                                required>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="public" class="form-check">
                            <label for="public">Public</label>
                        </div>
                        <button type="submit" class="btn btn-success btn-block btn-custom">
                            <i class="fa fa-plus"></i>
                            Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection