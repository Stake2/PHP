var mobile_buttons_id = "mobile_button_sidebar";
var show_mobile_buttons_id = "show_mobile_buttons";

function Show_Mobile_Buttons() {
	var mobile_buttons = document.getElementById(mobile_buttons_id);
	var show_mobile_buttons = document.getElementById(show_mobile_buttons_id);

	mobile_buttons.style.width = "300px";
	mobile_buttons.style.display = "block";
	show_mobile_buttons.style.display = "none";
}

function Hide_Mobile_Buttons() {
	var mobile_buttons = document.getElementById(mobile_buttons_id);
	var show_mobile_buttons = document.getElementById(show_mobile_buttons_id);

	mobile_buttons.style.width = "0px";
	mobile_buttons.style.display = "none";
	show_mobile_buttons.style.display = "block";
}

console.log("Side Menu Script was loaded.");