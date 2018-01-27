$(document).ready(function() {

  $('#calendar').fullCalendar({

	header: {
	  left: 'prev,next today',
	  center: 'title',
	  right: 'agendaWeek,month'
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
			color: rgb(0, 135, 69),
			eventBorderColor: rgb(0, 135, 69)
		},
		{
			googleCalendarId: 'santaclara.acm@gmail.com',
			color: rgb(0, 152, 233),
			eventBorderColor: rgb(0, 152, 233)
		}
	],

	eventClick: function(event) {
		// opens events in a popup window
		window.open(event.url, 'gcalevent', 'width=700,height=600');
		return false;
	},

	views: {
		agendaWeek: {
			titleFormat: 'MMMM YYYY',
			columnFormat: 'ddd D'
		}
	},

	loading: function(bool) {
		$('#loading').toggle(bool);
	}

  });

});
