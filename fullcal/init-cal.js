$(document).ready(function() {

  $('#calendar').fullCalendar({

	header: {
	  left: 'prev,next today',
	  center: 'title',
	  right: 'agendaWeek,month,listYear'
	},
	minTime: '08:00:00',
	maxTime: '22:00:00',
	navLinks: true,
	displayEventTime: true, // don't show the time column in list view
	eventLimit: true,
	googleCalendarApiKey: 'AIzaSyCnRyFyPuJ9WSeu602Q7CE13TsxWVNbw10',

	// Calendar
	eventSources: [
		{
			googleCalendarId: 'en.usa#holiday@group.v.calendar.google.com',
			color: 'green'
		},
		{
			googleCalendarId: 'santaclara.acm@gmail.com'
		}
	],

	eventClick: function(event) {
		// opens events in a popup window
		window.open(event.url, 'gcalevent', 'width=700,height=600');
		return false;
	},

	loading: function(bool) {
		$('#loading').toggle(bool);
	}

  });

});
