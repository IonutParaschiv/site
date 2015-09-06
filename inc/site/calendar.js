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
			events: events,
			eventClick: function(calEvent){
				$('#modalTitle').text('').text(calEvent.title + ' with ' + calEvent.custName + ' ' + calEvent.custSurname);
				$('#custName').text('').text(calEvent.custName + ' ' + calEvent.custSurname);
				$('#custEmail').text('').text(calEvent.custEmail);
				$('#custPhone').text('').text(calEvent.custPhone);
				$('#staffMemb').text('').text(calEvent.staffName + ' ' + calEvent.staffSurname);

				$('#bookingModal').modal('show');
			}

		});
		// $('#calendar').fullCalendar('today');
	}