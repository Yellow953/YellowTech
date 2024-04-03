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
            <div class='external-event bg-{{ $event->color }}'> {{ $event->title }} </div>
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
      /* initialize the external events
       -----------------------------------------------------------------*/
      function ini_events(ele) {
        ele.each(function () {
          // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
          // it doesn't need to have a start or end
          var eventObject = {
            title: $.trim($(this).text()) // use the element's text as the event title
          };

          // store the Event Object in the DOM element so we can get to it later
          $(this).data('eventObject', eventObject);

          // make the event draggable using jQuery UI
          $(this).draggable({
            zIndex: 1070,
            revert: true, // will cause the event to go back to its
            revertDuration: 0  //  original position after the drag
          });

        });
      }
      ini_events($('#external-events div.external-event'));

      /* initialize the calendar
       -----------------------------------------------------------------*/
      //Date for the calendar events (dummy data)
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
        droppable: true, // this allows things to be dropped onto the calendar !!!
        drop: function (date, allDay) {
        var originalEventObject = $(this).data('eventObject');
        var copiedEventObject = $.extend({}, originalEventObject);

        copiedEventObject.start = date;
        copiedEventObject.allDay = allDay;

        // Set date and time values
        copiedEventObject.date = date.format('YYYY-MM-DD');
        copiedEventObject.time = date.format('HH:mm:ss');



          // retrieve the dropped element's stored Event Object
          var originalEventObject = $(this).data('eventObject');

          // we need to copy it, so that multiple events don't have a reference to the same object
          var copiedEventObject = $.extend({}, originalEventObject);

          // assign it the date that was reported
          copiedEventObject.start = date;
          copiedEventObject.allDay = allDay;
          copiedEventObject.backgroundColor = $(this).css("background-color");
          copiedEventObject.borderColor = $(this).css("border-color");

          // render the event on the calendar
          // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
          $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

          // is the "remove after drop" checkbox checked?
          if ($('#drop-remove').is(':checked')) {
            // if so, remove the element from the "Draggable Events" list
            $(this).remove();
          }
        }
      });

      /* ADDING EVENTS */
      var currColor = "#3c8dbc";
      var color = 'red';
      var colorChooser = $("#color-chooser-btn");
      $("#color-chooser > li > a").click(function (e) {
        e.preventDefault();
        //Save color
        currColor = $(this).css("color");
        color = $(this).data('color');
        //Add color effect to button
        $('#add-new-event').css({"background-color": currColor, "border-color": currColor});
      });

      // Adding the event creation logic here
      $("#add-new-event").click(function (e) {
          e.preventDefault();
          console.log("Add button clicked");

          var title = $("#new-event").val();
          var date = ''; 
          var time = ''; 

          if (title.trim() === "") {
              alert("Please enter an event title.");
              return;
          }
          alert(color);

          $.ajax({
              url: "{{ route('calendar.create') }}",
              method: 'POST',
              data: {
                  title: title,
                  color: color,
                  date: date,
                  time: time,
                  _token: '{{ csrf_token() }}'
              },
              success: function (response) {
                  console.log(response);
              },
              error: function (xhr, status, error) {
                  console.error(xhr.responseText);
              }
          });

          // Clear the input field after adding the event
          $("#new-event").val("");
      });
    });
</script>
@endsection