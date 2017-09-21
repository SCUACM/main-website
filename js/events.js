// var details = 'May 16 the Maker Club and ACM will be attending the Maker Faire at the San Mateo Convention Center. Ticket prices will be subsidized by club funds. We will be meeting Saturday at 9:30 AM in the engineering quad. If you are interested in attending, please sign up <a href="http://goo.gl/forms/1fD58SRmt9">here</a>.'
// var details = 'SCU&#39;s 24 hours hackathon with prizes ($1000 for first place, $500 for second, $250 for third!). Full meals are provided each day, with beverages and snacks throughout. We will have mentors of various technical backgrounds who will be happy to help you. Register <a href="http:hackforthehomeless.com">now</a>!'
// var details = 'Join us for a presentation on, "Laying the Groundwork for your Technical Career," given by Google&#39;s Director of Games! We&#39;ll sit down for a conversation on career opportunities and technologies that you may be interested. Google swag provided.Be sure to RSVP <a href="https://docs.google.com/forms/d/19e5rGkLw7ab6F1mzghhsq_lJ4q5RgqKAKsq_rr-OLhc/viewform">here</a> so Google recruiters can contact you after the event!'
// var details = 'ACM goes to AMC! This Friday, we are going to see the Imitation Game at AMC Mercado (20). We are going to see the 6:50 showtime, and are going to In n out first! Rides are provided, and the ticket cost to you is only $5, but food is your own expense. We are now accepting sign-ups <a href="https://docs.google.com/forms/d/1vrUnLHEyxXwCkO-ccnCGPFrEqAQY_zwj9SMEEXmnlJo/viewform">here</a>, but be fast, we are only accepting the first 25 people who sign up! If you do sign up, we are meeting at 5:00 in front of the MCC (Shapell lounge) by benson. '
// var details = 'Cisco tour! Email <a href="mailto:SHPE@scu.edu" target="_blank">SHPE@scu.edu</a> to find out more!'
// var details = 'ACM&#39;s Brocade tour! The tour will take place on Thursday, April 9th from 2:30-4pm. It&#39;s going to be a great way to check out what it&#39;s like being a software engineer in the industry. Additionally, if you&#39;re looking for work this summer, there are going to be recruiters there looking for young aspiring software engineers like you guys! Please register for the tour beforehand <a href="http://goo.gl/forms/ZVzMCNJ7Uw">here</a> so we can get a headcount. We will meet at 2pm in front of the bookstore and take everyone over there.'

$('.zoom-btn').click(function() {
	var $this = $(this);

	var thumbnail = $this.closest('.thumbnail');
	var overlay = $this.closest('.overlay');

	var image = thumbnail.find('img').attr('src');
	var details = overlay.find('h7').text();
	var title = overlay.find('h2').text();

	$('.thumbnail').removeClass('open');

	var mediaRow = $this.closest('.media-row');

	if (mediaRow.next('.media-view').length != 0) {
		$('.media-thump img').attr('src', image);
		$('.media-info h2').text(title);
		$('.media-info h7').text(details);
	} else if (!thumbnail.hasClass('open')) {
		var mediaView = $('.media-view');

		mediaView.remove();
		mediaRow.after('<div class="media-view"><div class="media-thump"><img src="' + image + '"/></div><div class="media-info"> <h2>' + title + '</h2> <h7>' + details + '</h7></div> <span class="close">&times</span></div>');
		mediaView.slideDown();
		thumbnail.addClass('open');
	}
});

$('.media').on('click', '.close', function() {
	$(this).closest('.media-view').slideUp();
	$('.thumbnail').removeClass('open');

	setTimeout(function() {
		$('.media-view').remove();
	}, 2000);
});
