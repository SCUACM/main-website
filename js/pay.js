$('.card').on('click', function(e) {
	e.preventDefault();

	$('.card').removeClass('active');
	$(this).addClass('active');

	var form = $('.form');

	form.stop().slideUp();
	form.delay(300).slideDown();
});
