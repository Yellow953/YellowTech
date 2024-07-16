<script type="text/javascript">
    $(function () {
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
    var currColor = "#3c8dbc";
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
