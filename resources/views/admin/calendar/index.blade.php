@extends('admin.layouts.app')

@section('title', 'calendar')

@section('content')
<!-- Main content -->
<section class="content">
    <div class="box box-solid bg-blue-gradient">
        <div class="box-header">
            <i class="fa fa-calendar"></i>
            <h3 class="box-title">Calendar</h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
                <!-- button with a dropdown -->
                <div class="btn-group">
                    <button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"><i
                            class="fa fa-bars"></i></button>
                    <ul class="dropdown-menu pull-right" role="menu">
                        <li><a href="#">Add new event</a></li>
                        <li><a href="#">Clear events</a></li>
                        <li class="divider"></li>
                        <li><a href="#">View calendar</a></li>
                    </ul>
                </div>
                <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
            </div><!-- /. tools -->
        </div><!-- /.box-header -->
        <div class="box-body no-padding">
            <!-- The calendar -->
            <div id="calendar"></div>
        </div><!-- /.box-body -->
        <div class="box-footer text-black">
            <!-- Event form -->
            <form id="eventForm">
                <input type="hidden" name="user_id" id="user_id">
                <div class="form-group">
                    <label for="title">Event Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter event title">
                </div>
                <div class="form-group">
                    <input type="date" name="date" id="date" class="form-control" placeholder="Date" required>
                </div>

                <button type="submit" class="btn btn-primary">Add Event</button>
            </form>
        </div>
    </div><!-- /.box -->
</section><!-- /.content -->

@endsection
