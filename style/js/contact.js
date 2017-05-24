"use strict";
$('#contact > form').submit(function(e) {
	e.preventDefault();
	var name = $('#name').val(),
		email = $('#email').val(),
		subject = $('#subject').val(),
		message = $('#message').val(),
		sendButton = $('#ctc-submit');

	$(this)[0].reset();
	sendButton.text('Message Sent Succesfully');
	sendButton.addClass('sent');
	$.ajax({
		type: 'POST',
		url: 'contact.php',
		data: {
			'name': name,
			'email': email,
			'subject': subject,
			'message': message
		}
	});
});