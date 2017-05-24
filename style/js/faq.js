"use strict";
/*----------------
	TOOLTIP
----------------*/
$('.tooltip').tooltipster({
	animation: 'grow',
	position: 'bottom'
});

$(function() {
	var accordion = $('#faq > article > ul > li > h4');
	// show first accordion option
	accordion
		.eq(0)
		.addClass('selected rotate')
		.siblings()
		.show();

	accordion.click(function() {
		var option = $(this);
		if(!option.hasClass('selected')) {
		// if option isn't selected
			// hide other options
			accordion.each(function() {
				$(this)
					.removeClass('selected rotate')
					.siblings()
					.slideUp(600);
			});

			// show selected option
			option
				.addClass('selected rotate')
				.siblings()
				.slideDown(600);
		} else {
			// hide option
			option
				.removeClass('selected rotate')
				.siblings()
				.slideUp(600);
		}	
	});
});