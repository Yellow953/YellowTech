@extends('admin.layouts.app')

@section('title', 'calendar')

@section('content')
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

<!-- Page script -->
<script type="text/javascript">
    $(function () {
    /* initialize the external events */
    function ini_events(ele) {
        ele.each(function () {
            var eventObject = {
                title: $.trim($(this).text()),
                color: $(this).css('background-color')
            };
            $(this).data('eventObject', eventObject);
            $(this).draggable({
                zIndex: 1070,
                revert: true,
                revertDuration: 0
            });
        });
    }
    ini_events($('#external-events div.external-event'));

    /* initialize the calendar */
    var date = new Date();
    var d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear();
    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        buttonText: {
            today: 'today',
            month: 'month',
            week: 'week',
            day: 'day'
        },
        editable: true,
        droppable: true,
        eventRender: function(event, element) {
            element.append('<span class="closeon text-danger"><i class="fa-solid fa-trash-can"></i></span>');
            element.find(".closeon").click(function() {
                if (confirm("Are you sure you want to delete this event?")) {
                    $.ajax({
                        url: "{{ route('calendar.delete') }}",
                        method: 'POST',
                        data: {
                            id: event.id,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (response) {
                            $('#calendar').fullCalendar('removeEvents', event._id);
                            console.log(response.message);
                        },
                        error: function (xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                }
            });
        },
        drop: function (date, allDay) {
            var originalEventObject = $(this).data('eventObject');
            var copiedEventObject = $.extend({}, originalEventObject);
            copiedEventObject.start = date;
            copiedEventObject.allDay = allDay;

            var eventId = $(this).data('event-id');
            copiedEventObject.id = eventId;

            $.ajax({
                url: "{{ route('calendar.update') }}",
                method: 'POST',
                data: {
                    id: copiedEventObject.id,
                    date: date.format('YYYY-MM-DD'),
                    time: date.format('HH:mm:ss'),
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });

            if ($('#drop-remove').is(':checked')) {
                $(this).remove();
            }
        },
        events: function (start, end, timezone, callback) {
            $.ajax({
                url: "{{ route('calendar.events') }}",
                method: 'GET',
                dataType: 'json',
                success: function (response) {
                    var events = [];
                    $.each(response, function (index, event) {
                        events.push({
                            id: event.id,
                            title: event.title,
                            start: event.date + 'T' + event.time,
                            color: event.color
                        });
                    });
                    callback(events);
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        },
        eventDrop: function(event, delta, revertFunc) {
            $.ajax({
                url: "{{ route('calendar.update') }}",
                method: 'POST',
                data: {
                    id: event.id,
                    date: event.start.format('YYYY-MM-DD'),
                    time: event.start.format('HH:mm:ss'),
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    console.log('Event updated successfully.');
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                    revertFunc();
                }
            });
        },
        eventResize: function(event, delta, revertFunc) {
            $.ajax({
                url: "{{ route('calendar.update') }}",
                method: 'POST',
                data: {
                    id: event.id,
                    date: event.start.format('YYYY-MM-DD'),
                    time: event.start.format('HH:mm:ss'),
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    console.log('Event resized successfully.');
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                    revertFunc();
                }
            });
        }
    });

    /* ADDING EVENTS */
    var currColor = "#3c8dbc"; // default color
    $("#color-chooser > li > a").click(function (e) {
        e.preventDefault();
        currColor = $(this).data("color");
        $('#add-new-event').css({ "background-color": currColor, "border-color": currColor });
    });

    $("#add-new-event").click(function (e) {
        e.preventDefault();
        var title = $("#new-event").val();
        if (title.trim() === "") {
            alert("Please enter an event title.");
            return;
        }
        $.ajax({
            url: "{{ route('calendar.create') }}",
            method: 'POST',
            data: {
                title: title,
                color: currColor,
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                var newEvent = {
                    id: response.event.id,
                    title: response.event.title,
                    start: response.event.date + 'T' + response.event.time,
                    color: response.event.color
                };
                $('#external-events').append("<div class='external-event' style='background-color: " + newEvent.color + "' data-event-id='" + newEvent.id + "'> " + newEvent.title + " </div>");
                ini_events($('#external-events div.external-event'));
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
        $("#new-event").val("");
    });
});
</script>

@endsection