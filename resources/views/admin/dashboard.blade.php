@extends('admin.layouts.app')

@section('title', 'dashboard')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-lg-2 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{ $orders_count }}</h3>
                    <p>Orders</p>
                </div>
                <a href="{{ route('orders') }}" class="small-box-footer">More info <i
                        class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-2 col-xs-6">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{ $products_count }}</h3>
                    <p>Products</p>
                </div>
                <a href="{{ route('products') }}" class="small-box-footer">More info <i
                        class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-2 col-xs-6">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{ $users_count }}</h3>
                    <p>Users</p>
                </div>
                <a href="{{ route('users') }}" class="small-box-footer">More info <i
                        class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-2 col-xs-6">
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{ $projects_count }}</h3>
                    <p>Projects</p>
                </div>
                <a href="{{ route('projects') }}" class="small-box-footer">More info <i
                        class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-2 col-xs-6">
            <div class="small-box bg-maroon">
                <div class="inner">
                    <h3>{{ $tickets_count }}</h3>
                    <p>Tickets</p>
                </div>
                <a href="{{ route('tickets') }}" class="small-box-footer">More info <i
                        class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-2 col-xs-6">
            <div class="small-box bg-purple">
                <div class="inner">
                    <h3>{{ $invoices_count }}</h3>
                    <p>Invoices</p>
                </div>
                <a href="{{ route('invoices') }}" class="small-box-footer">More info <i
                        class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- To Do List -->
        <div class="col-md-6">
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
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header">
                    <i class="fa fa-envelope"></i>
                    <h3 class="box-title">Quick Email</h3>
                </div>
                <form action="{{ route('send.quick.email') }}" method="POST">
                    @csrf
                    <div class="box-body">

                        <div class="form-group">
                            <input type="email" name="recipient" class="form-control" id="recipient"
                                placeholder="Email to:">
                        </div>
                        <div class="form-group">
                            <input type="text" name="subject" class="form-control" id="subject" placeholder="Subject">
                        </div>
                        <div>
                            <textarea name="message" class="form-control" id="message" placeholder="Message"
                                style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                required></textarea>
                        </div>

                    </div>
                    <div class="box-footer clearfix">
                        <button class="w-100 btn btn-success" type="submit">Send
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection