"use strict";
/*-----------------
	RESIZE IMAGE
-----------------*/
$("figure.imgLiquidFill").imgLiquid();

/*-----------------
	WOW INIT
-----------------*/
var wow = new WOW();
wow.init();

/*------------------------
   SMOOTH ANCHOR SCROLL 
------------------------*/
$('a[href*=#]:not([href=#])').click(function() {
	if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	  var target = $(this.hash);
	  target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	  if (target.length) {
	    $('html,body').animate({
	      scrollTop: target.offset().top
	    }, 1000);
	    return false;
	  }
	}
});

var windowSize = $(window).width(),
	menu = $('#main-nav > ul > li'),
	pull = $('#pull');

/*------------------------------------
   MENU SLIDE ANIMATION AND BORDER 
------------------------------------*/
if(windowSize > 1000) {
	menu.bind('mouseenter', toggleMenu);
	menu.bind('mouseleave', toggleMenu);
} else {
	menu.filter('.sub-items').bind('click', expandMenu);
}

/**
 * Prevent sub-item click from bubbling up the DOM tree
 */
menu.find('ul > li').on('click', stopBubbling);

 $(pull).on('click', function(e) {  
    e.preventDefault();  
    $('#main-nav > ul').slideToggle();  
});  

/*---------------------------------
	RESPONSIVE MENU EVENT TOGGLE 
---------------------------------*/
$(window).resize(function() {
	"use strict";
	var windowSize = $(window).width(),
		menu = $('#main-nav > ul > li');
	if(windowSize > 1000) {
		$('#main-nav > ul').show();
		menu.children('ul').hide();
		menu.filter('.sub-items').unbind();
		menu.bind('mouseenter', toggleMenu);
		menu.bind('mouseleave', toggleMenu);
	} else {
		$('#main-nav > ul').hide();
		menu.unbind();
		menu.filter('.sub-items').bind('click', expandMenu);
	}
});

function toggleMenu(e) {
	e.preventDefault();
	$(this).children('ul').stop().slideToggle(300);
	$(this).children('a').toggleClass('red-border');
}

function expandMenu(e) {
	e.preventDefault();
	$(this).children('ul').stop().slideToggle(300);
}

function stopBubbling(e) {
	e.stopPropagation();
}