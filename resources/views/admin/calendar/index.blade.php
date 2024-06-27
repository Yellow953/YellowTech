@extends('admin.layouts.app')

@section('title', 'calendar')

@section('content')

<!-- FullCalendar -->
<link href="{{ asset('admin/plugins/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin/plugins/fullcalendar/fullcalendar.print.css')}}" rel="stylesheet" type="text/css"
    media='print' />
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.7.0/moment.min.js"></script>
<script src="{{ asset('admin/plugins/fullcalendar/fullcalendar.min.js')}}"></script>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-3">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h4 class="box-title">Draggable Events</h4>
                </div>
                <div class="box-body">
                    <!-- the events -->
                    <div id='external-events'>
                        @foreach($events as $event)
                        @if (!$event->date)
                        <div class='external-event' style='background-color: {{ $event->color }}'
                            data-event-id='{{ $event->id }}'> {{ $event->title }} </div>
                        @endif
                        @endforeach
                        <div class="checkbox">
                            <label for='drop-remove'>
                                <input type='checkbox' id='drop-remove' checked />
                                remove after drop
                            </label>
                        </div>
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /. box -->
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Create Event</h3>
                </div>
                <div class="box-body">
                    <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                        <ul class="fc-color-picker" id="color-chooser">
                            @foreach (Helper::get_event_colors() as $color)
                            <li><a class="text-{{ $color }}" data-color="{{ $color }}" href="#"><i
                                        class="fa fa-square"></i></a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="d-flex">
                        <input id="new-event" type="text" class="form-control" placeholder="Event Title">
                        <button id="add-new-event" type="button" class="btn btn-primary ">Add</button>
                    </div><!-- /input-group -->
                </div>
            </div>
        </div><!-- /.col -->
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-body no-padding">
                    <!-- THE CALENDAR -->
                    <div id="calendar"></div>
                </div><!-- /.box-body -->
            </div><!-- /. box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section>

@include('admin.scripts._calendar')

@endsection