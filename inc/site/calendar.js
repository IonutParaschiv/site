	function renderCalendar(events){
		var currentDate = new Date();

        $('#calendar').fullCalendar('removeEvents');
        $('#calendar').fullCalendar('addEventSource', events);

		$('#calendar').fullCalendar({
			header: {
				left: 'today,month,agendaWeek,agendaDay',
				center: 'title',
				right: 'prev,next '
			},
			defaultDate: currentDate,
			editable: false,
			eventLimit: false,
			firstDay: 1,
			height:500,
			width:650,
			scrollTime: "09:00:00",
			defaultView: 'agendaDay',
			events: events

		});
		// $('#calendar').fullCalendar('today');
	}