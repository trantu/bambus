"use strict";
$(function() {
	
	// vertically center form boxes
	$('.form-box').each(function() {
		var form = $(this),
			formBoxHeight = form.outerHeight();
		form.css('marginTop', -formBoxHeight/2);
	});

	// popup open
	$('.popup').click(function(e) {
		e.preventDefault();
		var button = $(this);

		// show form overlay
		$('.form-box-overlay').fadeIn(600);
		
		// hide previous form
		button.parents('.form-box').fadeOut(600);

		// show login form and focus
		if(button.hasClass('login')) {
			$('.form-box.login').fadeIn(600);
			$('#login_user').focus();
		}
		// show register form and focus
		if(button.hasClass('register')) {
			$('.form-box.register').fadeIn(600);
			$('#register_email').focus();
		}
		// show reset form and focus
		if(button.hasClass('reset')) {
			$('.form-box.reset').fadeIn(600);
			$('#reset_email').focus();
		}

		// disable scroll
		$('body').addClass('noscroll');
	});

	// popup close
	$('.form-close').click(function(e) {
		e.preventDefault();
		// close active form
		$(this).parent().fadeOut(600);

		// close form overlay
		$('.form-box-overlay').fadeOut(600);
		
		// enable scroll
		$('body').removeClass('noscroll');
	});
});