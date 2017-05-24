"use strict";
/*----------------
	TOOLTIP
----------------*/
$('.tooltip').tooltipster({
	animation: 'grow',
	position: 'bottom'
});

var wishTooltip = $('.cart-tip').tooltipster({
	content: 'Add to WishList',
	animation: 'grow',
	position: 'top',
	multiple: true
});

var cartTooltip = $('.cart-tip').tooltipster({
	content: 'Add to cart',
	animation: 'grow',
	position: 'bottom',
	multiple: true
});

// disable add to cart tooltip for grid default view
for(var i=0; i<cartTooltip.length; i++)
	cartTooltip[i].disable();

$(function() {
	$('ul.views > li > a').click(function(e) {
		e.preventDefault();
		var option = $(this);
		if(!option.parent('li').hasClass('selected')) {
		// if the option wasn't previously selected
			selectOption(option);
		}
	});

	function selectOption(option) {
		var options = ['grid', 'detail', 'list'],
			type = option.attr('class').split(/\s+/).splice('tooltip', 1)[0],
			index = options.indexOf(type),
			dishes = $('ul.dishes'),
			views = $('ul.views > li');

		options.splice(index, 1);
		// remove other classes
		for(var i=0; i<options.length; i++) {
			dishes.removeClass(options[i]);
		}
		// add current view class
		dishes.addClass(type);
		if(type == 'list') {
			// change circle class
			dishes.find('div.circle').each(function() {
				$(this)
					.removeClass('medium')
					.addClass('tiny')
					.find('div.fill')
					.children('img')
					.attr('src', 'style/images/plus-icon.png');
			});
			// add list elements 
			dishes.children('li').each(addListElements);
			// toggle tooltips
			for(var i=0; i<cartTooltip.length; i++)
				cartTooltip[i].enable();
			for(var i=0; i<wishTooltip.length; i++)
				wishTooltip[i].disable();		
		} else {
			// change circle class
			dishes.find('div.circle').each(function() {
				$(this)
					.removeClass('tiny')
					.addClass('medium')
					.find('div.fill')
					.children('img[alt="star"]')
					.attr('src', 'style/images/star-hover.png');
				$(this)	
					.find('div.fill > img[alt="heart"]')
					.attr('src', 'style/images/heart-hover.png');
			});
			// remove list elements 
			dishes.children('li').each(removeListElements);
			// toggle tooltips
			for(var i=0; i<cartTooltip.length; i++)
				cartTooltip[i].disable();
			for(var i=0; i<wishTooltip.length; i++)
				wishTooltip[i].enable();	
		}
		// unselect previous option
		views.each(function() {
			$(this).removeClass('selected');
		});
		// select current option
		option.parent('li').addClass('selected');
	}

	function addListElements() {
		var priceValue = $(this).find('div.price > p').text(),
			priceTag = $('<h6>'),
			quantity = $(this).find('p.quantity').text(),
			measure = $(this).find('p.measure').text(),
			description = $(this).find('article > p');

		// add line
		$(this).find('article > ul.rate').after('<hr>');

		// add price
		priceTag.text(priceValue);
		$(this).append(priceTag);

		switch(measure) {
			case 'srv':
				measure = 'Serving/s';
				break;
			case 'pcs':
				measure = 'Piece/s';
				break;
		}
		// add description
		description.append('<span> ' + quantity + ' ' + measure + '</span>');
	}

	function removeListElements() {
		// remove line
		$(this).find('article > hr').remove();

		// remove price
		$(this).children('h6').remove();
		
		// remove description
		$(this).find('article > p > span').remove();
	}

});