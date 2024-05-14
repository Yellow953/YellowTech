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
            <div class='external-event bg-{{ $event->color }}' data-event-id='{{ $event->id }}'> {{ $event->title }} </div>
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
              <li><a class="text-{{ $color }}" data-color="{{ $color }}" href="#"><i class="fa fa-square"></i></a></li>
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

<!-- Page specific script -->
<script type="text/javascript">
$(function () {
    /* initialize the external events */
    function ini_events(ele) {
        ele.each(function () {
            var eventObject = {
                title: $.trim($(this).text())
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
        drop: function (date, allDay) {
            var originalEventObject = $(this).data('eventObject');
            var copiedEventObject = $.extend({}, originalEventObject);
            copiedEventObject.start = date;
            copiedEventObject.allDay = allDay;

            // Retrieve the event's id from the data attribute
            var eventId = $(this).data('event-id');
            copiedEventObject.id = eventId;

            // Proceed with the AJAX request
            $.ajax({
                url: "{{ route('calendar.update') }}",
                method: 'POST',
                data: {
                    id: copiedEventObject.id,
                    date: date.format(),
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    copiedEventObject.id = response.event.id;
                    copiedEventObject.start = response.event.date;
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
                data: {
                    // Pass any additional parameters if needed
                },
                success: function (response) {
    console.log(response); // Log the response to verify its structure
    var events = [];
    $.each(response, function (index, event) {
        var eventDate = new Date(event.date); // Convert date string to Date object
        events.push({
            id: event.id,
            title: event.title,
            start: eventDate, // Use the converted Date object
            color: event.color // Optionally include color if needed
        });
    });
    callback(events);
},
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
    });

    /* ADDING EVENTS */
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
                color: 'red', // Default color, you can change this as needed
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                var newEvent = {
                    id: response.event.id,
                    title: response.event.title,
                    start: response.event.date
                };
                $('#calendar').fullCalendar('renderEvent', newEvent, true);
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
