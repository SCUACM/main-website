$(window).scroll(function() {
	$('.navbar').css({ 'background-color': $(window).scrollTop() > 97 ? '#fff' : 'transparent' });
});

$(window).scroll(function() {
	if ($(window).width() > 767) {
		var color = $(window).scrollTop() > 97 ? '#000' : '#fff';

		$('#name, #myNavbar a').css({ color: color });
	}
});

$(window).resize(function() {
	if ($(window).scrollTop() < 97) {
		var color = $(window).width() < 768 ? '#000' : '#fff';

		$('#name, #myNavbar a').css({ color: color });
	}
});
