"use strict";
/*----------------
	TOOLTIP
----------------*/
$('.tooltip').tooltipster({
	content: 'Add to WishList',
	animation: 'grow',
	position: 'top'
});
/*-----------------
	MAIN SLIDER
-----------------*/
$('#main-slider').bxSlider({
	pager: false,
	prevSelector: '#previous',
	prevText: '<img src="style/images/arrow-left.png">',
	nextSelector: '#next',
	nextText: '<img src="style/images/arrow-right.png">',
	easing: 'ease-in',
	speed: 800,
	auto: true
});

/*-----------------
   REVIEW SLIDER
-----------------*/
$('#review-slider').bxSlider({
	pager: false,
	controls: false,
	easing: 'ease-in',
	speed: 800,
	auto: true
});

$(function() {
	/*-----------------------------
		CONTACT FORM VALIDATION
	-----------------------------*/
	function ctcValidation() {
		var email = document.getElementById('email'),
			message = document.getElementById('message'),
			form = email.form,
			button = document.getElementById('ctc-submit'),
			valid = true;

		// Button reset
		button.innerHTML = 'Send Message';
		button.className = '';

		// Message Validation
		if(message.value == null || (message.value).length == 0 || /^\s+$/.test(message.value)) { 
		  	message.focus();
		  	message.className = 'error';
		    form.getElementsByClassName('msg-wrng')[0].style.display = 'block';
		  	valid = false;
		} else {
			message.className = '';
			form.getElementsByClassName('msg-wrng')[0].style.display = 'none';
		}

		// Email Validation
		if( !(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.([a-zA-Z]{2,4})+$/.test(email.value)) ) {
		  	email.focus();
		  	email.className = 'error';
		  	 form.getElementsByClassName('email-wrng')[0].style.display = 'block';
		  	valid = false;
		} else {
			email.className = '';
			form.getElementsByClassName('email-wrng')[0].style.display = 'none';
		}

		return valid;
	}

	// var ctcButton = document.getElementById('ctc-submit');
	// ctcButton.onclick = ctcValidation;

	/*--------------
	   WAYPOINTS
	--------------*/
	//SPECIALS
	$('#specials').waypoint(function() {
		$('#specials span.ribbon').slideDown(600);
	}, {triggerOnce: true}
	);

	//STAT CHARTS
	$('#combos h6').waypoint(function() {
		var count = 4;
		$('.stats').easyPieChart({
			barColor: '#db2e2e',
			trackColor: '#535353',
			lineWidth: 12,
			size: 200,
			lineCap: 'square',
			scaleColor: false,
			onStep: function(from, to, percent) {
	            $(this.el).find('span').each(function() {
	            	var value, perc;
	            	if(count) {
	            		value = $(this).text();          		
	            		$(this).data('value', value);
	            		count--;
	            	} else {
	            		value = $(this).data('value');
	            	}
	            	perc = (percent * value/100);
	            	$(this).text(Math.round(perc));
	            });
	        }
		});
	}, {triggerOnce: true}
	);
});

var dishes = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    prefetch: './index.php?mod=j_search'
});

//dishes.clearPrefetchCache();

$('.typeahead').typeahead({
        hint: $('.Typeahead-hint'),
        menu: $('.Typeahead-menu'),
        minLength: 1,
        classNames: {
            open: 'TH-open',
            empty: 'is-empty',
            cursor: 'is-active',
            suggestion: 'Typeahead-suggestion',
            selectable: 'Typeahead-selectable'
        }
    },
    {
        name: 'dishes',
        displayKey: 'name',
        source: dishes.ttAdapter()

    }).on('typeahead:selected', onAutocompleted);

function onAutocompleted($e, data) {
    $('.form-box-overlay').css('z-index','999999');
    $('.form-box-overlay').css('opacity','0.1');
    $('.form-box-overlay').css('display','block');
    $('.form-box-overlay').html('<img style=" position: absolute; margin: auto;top: 0; left: 0;right: 0;bottom: 0;" src="upload/ajax-loader.gif"> loading...');
    var idSP = data.id;
    var note='';
    $.ajax({
        type:'POST',
        url:'index.php?mod=j_add',
        data:{idSP:idSP,note:note},
        success:function(hn){
            $('.sum_total').html(hn + '' + ICONPRICE);
            $.ajax({
                type:'POST',
                url:"index.php?mod=j_totaldishis",
                success:function(sms){
                    $('.total_dishis').html(sms);
                    $.ajax({
                        type:'POST',
                        url: "index.php?mod=j_showcart",
                        data:'idSP='+ idSP,
                        success:function(smgs){
                            if($.isNumeric(smgs)==true){
                                var sl=$('.quantity'+idSP).eq(-1).text();
                                sl=parseInt(sl);
                                var quantt=sl + 1;
                                var total_price1=(quantt*smgs).toFixed(2);
                                total_price1=total_price1.replace('.',',');
                                $('.price'+idSP).eq(-1).html(ICONPRICE + '' + total_price1);
                                $('.quantity'+idSP).eq(-1).html(quantt);
                            }
                            else{
                                $('#order_summary').append(smgs);
                            }
                            $('.form-box-overlay').css('display','none');
                            $('.form-box-overlay').css('z-index','9999');
                            $('.form-box-overlay').css('opacity','1');
                            $('.form-box-overlay').html('');

                            // Checkout
                            if(window.location.href.indexOf('checkout') != -1)
                            {
                                location.reload();
                            }

                            // Set empty
                            $('.typeahead').val('');
                        }
                    })
                }
            })
        }
    }) ;return false;
};

$('.twitter-typeahead').addClass('TH-absolute');
$('.twitter-typeahead').siblings('.tt-menu').addClass('TH-open');
