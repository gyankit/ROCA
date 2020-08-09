// JavaScript Document
(function($){
	"use strict";

	$('#roll').keyup(function() {
		if( $('#roll').val().match( /^([A-Z]{2})\/(\d{2})\/(\d{2,3})$/ ) ) { $('#roll-info').hide(); }
		else { $('#roll-info').show(); }
	}).focus(function() { $('#roll-info').show(); 
	}).blur(function() { $('#roll-info').hide(); 
	});

	$('#contact').keyup(function() {
		if( $('#contact').val().length !== 10 ) { $('#contact-info').show(); }
		else { $('#contact-info').hide(); }
	}).focus(function() { $('#contact-info').show(); 
	}).blur(function() { $('#contact-info').hide(); 
	});

	$('#email').keyup(function() {
		if( $('#email').val().match( /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/ ) ) { $('#email-info').hide(); }
		else { $('#email-info').show(); }
	}).focus(function() { $('#email-info').show(); 
	}).blur(function() { $('#email-info').hide(); 
	});

	$('#date').keyup(function() {
		if( $('#date').val().match( /^(\d{1,2})\-(\d{1,2})\-(\d{4})$/ ) ) { $('#date-info').hide(); }
		else { $('#date-info').show(); }
	}).focus(function() { $('#date-info').show(); 
	}).blur(function() { $('#date-info').hide();
	});

	$('#year').keyup(function() {
		if( $('#year').val().length !== 4 ) { $('#year-info').show(); }
		else { $('#year-info').hide(); }
	}).focus(function() { $('#year-info').show(); 
	}).blur(function() { $('#year-info').hide(); 
	});

	$('#pswd').keyup(function() {
		var pswd = $('#pswd').val();
		//validate the length
		if ( pswd.length < 8 ) { $('#length').removeClass('valid').addClass('invalid'); }
		else { $('#length').removeClass('invalid').addClass('valid'); }

		//validate letter
		if ( pswd.match(/[A-z]/) ) { $('#letter').removeClass('invalid').addClass('valid'); }
		else { $('#letter').removeClass('valid').addClass('invalid'); }

		//validate capital letter
		if ( pswd.match(/[A-Z]/) ) { $('#capital').removeClass('invalid').addClass('valid'); }
		else { $('#capital').removeClass('valid').addClass('invalid'); }

		//validate number
		if ( pswd.match(/\d/) ) { $('#number').removeClass('invalid').addClass('valid'); }
		else { $('#number').removeClass('valid').addClass('invalid'); }

		if(pswd.length >= 8 && pswd.match(/[A-z]/) && pswd.match(/[A-Z]/) && pswd.match(/\d/) ) { $('#pswd_info').hide(); }
		else { $('#pswd_info').show(); }
	}).focus(function() { $('#pswd_info').show();
	}).blur(function() { $('#pswd_info').hide();
	});

	$('#image-upload').ready(function() {
		$.uploadPreview({
			input_field: "#image-upload",   // Default: .image-upload
			preview_box: "#image-preview",  // Default: .image-preview
			label_field: "#image-label",    // Default: .image-label
			label_default: "Choose Picture",   // Default: Choose File
			label_selected: "Change Picture",  // Default: Change File
			no_label: false                 // Default: false
		});
	});

	$('#image-upload').bind('change',function() {
		var pic=(this.files[0].size);
		if(pic>150000) {
			alert("Image Size Must be Less than 150kb");
			$('#sbt_btn').prop('disabled', true);
		}
		else { $('#sbt_btn').prop('disabled', false); }
	});
})(jQuery);