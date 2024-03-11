@extends('admin.layouts.app')

@section('title', 'calendar')

@section('content')
<!-- Main content -->
<section class="content">
    <div class="box box-solid bg-green-gradient">
        <div class="box-header">
            <i class="fa fa-calendar"></i>
            <h3 class="box-title">Calendar</h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
                <!-- button with a dropdown -->
                <div class="btn-group">
                    <button class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown"><i
                            class="fa fa-bars"></i></button>
                    <ul class="dropdown-menu pull-right" role="menu">
                        <li><a href="#">Add new event</a></li>
                        <li><a href="#">Clear events</a></li>
                        <li class="divider"></li>
                        <li><a href="#">View calendar</a></li>
                    </ul>
                </div>
                <button class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
            </div><!-- /. tools -->
        </div><!-- /.box-header -->
        <div class="box-body no-padding">
            <!-- The calendar -->
            <div id="calendar"></div>
        </div><!-- /.box-body -->
        <div class="box-footer text-black">
            <!-- Add your progress bars or any additional content here -->
        </div>
    </div><!-- /.box -->

    <!-- ... (your existing content) -->

</section><!-- /.content -->

<script>
    // Initialize FullCalendar
    document.addEventListener('DOMContentLoaded', function () {
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            editable: true,
            events: '/admin/calendar/events' // Fetch events dynamically
        });
    });
</script>

<!-- ... (your existing content) -->

@endsection