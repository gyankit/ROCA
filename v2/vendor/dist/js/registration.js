// JavaScript Document
function showpassword() {
	"use strict";
	var x = document.getElementById("pswd");

	if (x.type === "password") {
		x.type = "text";
	} 
	else {
		x.type = "password";
	}
}

function registration()
{ 
	"use strict";
	var names = document.forms.name.value;
	var rolls = document.forms.roll.value;
	var dept = document.forms.department.value;
	var phone = document.forms.contact.value;
	var emails = document.forms.email.value;
	var dates = document.forms.date.value;
	var years = document.forms.year.value;
	var pswds = document.forms.password.value;

	if(names===""){
		alert("Please Provide your name!");
		document.forms.name.focus();
		return false;
	}

	var rl;
	if( rl = rolls.match( /^([A-Z]{2})\/(\d{2})\/(\d{2,3})$/ ) ) {
		if(rl[1]!=="CS") {
			if(rl[1]!=="ME") {
				if(rl[1]!=="IT") {
					if(rl[1]!=="EE") {
						if(rl[1]!=="EC") {
							if(rl[1]!=="CH") {
								alert("Please Provide valid department in Roll No! : " + rl[1]);
								document.forms.rolls.focus();
								return false;
							}
						}
					}
				}
			}
		}
		if(rl[2]<11 || rl[2]>(new Date()).getFullYear().toString().slice(2)) {
			alert("Please Provide valid year in Roll No! : " + rl[2]);
			document.forms.rolls.focus();
			return false;
		}
		if(rl[3]<1) {
			alert("Please Provide valid roll in Roll No! : " + rl[3]);
			document.forms.rolls.focus();
			return false;
		}
	}
	else {
		alert("Please Provide your Roll No!");
		document.forms.rolls.focus();
		return false;
	}

	if(dept===""){
		alert("Please Provide your department!");
		document.forms.department.focus();
		return false;
	}

	if(phone.length!==0 || phone.length!==10){
		alert("Please Provide valid contact no!");
		document.forms.contact.focus();
		return false;
	}

	if( !emails.match( /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/ ) ) {
		alert("Please Provide your Email ID!");
		document.forms.email.focus();
		return false;
	}

	var dt;
	if( dt = dates.match( /^(\d{1,2})\-(\d{1,2})\-(\d{4})$/ ) ) {
		if(dt[1]<1 || dt[1]>31) {
			alert("Please Provide valid date : " + dt[1]);
			document.forms.date.focus();
			return false;
		}
		if(dt[2]<1 || dt[2]>12) {
			alert("Please Provide valid month : " + dt[2]);
			document.forms.date.focus();
			return false;
		}
		if(dt[3]<2011 || dt[3]>(new Date()).getFullYear()) {
			alert("Please Provide valid year : " + dt[3]);
			document.forms.date.focus();
			return false;
		}
	}
	else {
		alert("Please Provide valid Date!");
		document.forms.date.focus();
		return false;
	}

	if(years.length!==4 || years<2011 || years>(new Date()).getFullYear()) {
		alert("Please Provide valid Year!");
		document.forms.year.focus();
		return false;
	}

	if(pswds.length < 8 && !pswds.match(/[a-z]/) && !pswds.match(/[A-Z]/) && !pswds.match(/\d/) ) {
		alert("Please Provide valid Password!");
		document.forms.password.focus();
		return false;
	}

	return true;
}