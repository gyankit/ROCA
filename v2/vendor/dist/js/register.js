// JavaScript Document
(function($){
	"use strict";
	var a = false, b = false, c = false, d = false, e = false, f = false, g = false;

	$('#roll').keyup(function() {
		if( $('#roll').val().match( /^([A-Z]{2})\/(\d{2})\/(\d{2,3})$/ ) ) { 
			$('#roll-info').hide(); 
			a = true;
		}
		else { 
			$('#roll-info').show(); 
			a = false;
		}
	}).focus(function() { $('#roll-info').show(); 
	}).blur(function() { $('#roll-info').hide(); 
	});

	$('#contact').keyup(function() {
		if( $('#contact').val().length !== 10 || $('#contact').val().length !== 0 ) { 
			$('#contact-info').show(); 
			b = true;
		}
		else { 
			$('#contact-info').hide(); 
			b = false;
		}
	}).focus(function() { $('#contact-info').show(); 
	}).blur(function() { $('#contact-info').hide(); 
	});

	$('#email').keyup(function() {
		if( $('#email').val().match( /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/ ) ) { 
			$('#email-info').hide(); 
			c = true;
		}
		else { 
			$('#email-info').show(); 
			c = false;
		}
	}).focus(function() { $('#email-info').show(); 
	}).blur(function() { $('#email-info').hide(); 
	});

	$('#date').keyup(function() {
		if( $('#date').val().match( /^(\d{1,2})\-(\d{1,2})\-(\d{4})$/ ) ) { 
			$('#date-info').hide(); 
			d = true;
		}
		else { 
			$('#date-info').show(); 
			d = false;
		}
	}).focus(function() { $('#date-info').show(); 
	}).blur(function() { $('#date-info').hide();
	});

	$('#year').keyup(function() {
		if( $('#year').val().length !== 4 ) { 
			$('#year-info').show(); 
			e = true;
		}
		else { 
			$('#year-info').hide();
			e = false;
		}
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

		if(pswd.length >= 8 && pswd.match(/[A-z]/) && pswd.match(/[A-Z]/) && pswd.match(/\d/) ) { 
			$('#pswd_info').hide(); 
			f = true;
		}
		else { 
			$('#pswd_info').show(); 
			f = false;
		}
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
			g = true;
			$('#sbt_btn').prop('disabled', true);
		}
		else { 
			g = false;
			$('#sbt_btn').prop('disabled', false);
		}
	});
	/*
	if ( a && b && c && d && e && f && g === true ) {
		$('#sbt_btn').prop('disabled', false);
		//document.getElementById('sbt_btn').disabled = false;
		//$('#sbt_btn').attr("disabled", false);
	} else {
		$('#sbt_btn').prop('disabled', true);
		//document.getElementById('sbt_btn').disabled = true;
		//$('#sbt_btn').attr("disabled", false);
	}
	*/
})(jQuery);