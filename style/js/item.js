"use strict";
/*----------------
	TOOLTIP
----------------*/
$('.tooltip').tooltipster({
	animation: 'grow',
	position: 'bottom'
});

/*----------------
	COUNTER
----------------*/
$('.counter').click(function(e) {
	e.preventDefault();
	var counter = $(this),
		container = counter.siblings('div'),
		content = parseInt(container.text());
	if(counter.hasClass('up')) {
		container.text(++content);
	}
	if(counter.hasClass('down')) {
		if(content > 1) 
			container.text(--content);
	}
});

/*------------
	RATE
------------*/
var rate = $('#review-input ul.rate > li');
$('#review-input ul.rate > li').click(function() {
	var item = $(this),
		total = rate.length,
		index = item.index();
	if(item.hasClass('empty')) {
		for(var i=0; i<=index; i++) 
			rate.eq(i).removeClass('empty');
	} else {
		for(var i=total; i>index; i--) 
			rate.eq(i).addClass('empty');
	}
});