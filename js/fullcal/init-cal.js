$(document).ready(function() {

  $('#calendar').fullCalendar({

	header: {
	  left: 'prev,next today',
	  center: 'title',
	  right: 'agendaWeek,month'
	},
	defaultView: 'month',
	minTime: '08:00:00',
	maxTime: '22:00:00',
	eventLimit: true,
	googleCalendarApiKey: 'AIzaSyCnRyFyPuJ9WSeu602Q7CE13TsxWVNbw10',

	// Calendar
	eventSources: [
		{
			googleCalendarId: 'en.usa#holiday@group.v.calendar.google.com',
			color: 'rgb(0, 135, 69)',
			borderColor: 'rgb(0, 135, 69)'
		},
		{
			googleCalendarId: 'santaclara.acm@gmail.com',
			color: 'rgb(0, 152, 233)',
			borderColor: 'rgb(0, 152, 233)'
		}
	],

	// overwrite to give a better event click function
	eventClick: function(event) {
		// opens events in a popup window
		window.open(event.url, 'gcalevent', 'width=700,height=600');
		return false;
	},

	eventRender: function(event, element) {
		var title = '<h4>'+event.title+'</h4>';

		var body = '<p><b>When:</b> ';
		if (event.allDay)
		    body += 'All day';
		else {
			var start = moment(event.start).format("h:mma");
			var end = moment(event.end).format("h:mma");
			body += start + ' - ' + end;
		}

		if (event.location)
			body += '<br/><p><b>Where:</b> ' + event.location;
		if (event.description)
			body += '<br/><p><b>Description:</b> ' + event.description;

		element.qtip({
			prerender: true,
			content: {
				text: body,
				title: {
					button: false,
					text: title
				}
			},
			position: {
				my: 'bottom center',
				at: 'top center',
				target: 'event',
				viewport: $('#calendar'),
				adjust: {
				  mouse: false,
				  scroll: false
				}
			},
			show: {
				hover: true,
				effect: function() { $(this).fadeIn(250); }
			},
			hide: {
				fixed: true,
				delay: 100,
				effect: function() { $(this).fadeOut(250); }
			},
			style: 'qtip-light qtip-shadow qtip-rounded'
		});
	},

	views: {
		agendaWeek: {
			titleFormat: 'MMMM YYYY',
			columnFormat: 'ddd D'
		}
	},

	loading: function(bool) {
		$('#loading').toggle(bool);
	},

	windowResize: function(view) {
      if ($(window).width() < 514){  // Mobile options
        $('#calendar').fullCalendar( 'changeView', 'agendaDay' );
        $('#calendar').fullCalendar( 'option', {
        	header: {
			  	left: 'prev,next today',
			  	center: 'title',
			  	right: 'agendaDay'
			}
        })
      } else {  // Full screen options
        $('#calendar').fullCalendar( 'changeView', 'month' );
        $('#calendar').fullCalendar( 'option', {
        	header: {
			  	left: 'prev,next today',
			  	center: 'title',
			  	right: 'agendaWeek,month'
			}
        })
      }
    }

  });

});
