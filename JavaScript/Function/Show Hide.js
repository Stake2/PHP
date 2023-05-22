var computer_buttons_id = "computer_buttons_bar";
var show_computer_buttons_id = "show_computer_buttons";
var computer_buttons_bar_space_id = "computer_buttons_bar_space";

function Hide_Computer_Buttons() {
	var computer_buttons = document.getElementById(computer_buttons_id);
	var show_computer_buttons = document.getElementById(show_computer_buttons_id);
	var computer_buttons_bar_space = document.getElementById(computer_buttons_bar_space_id);

	computer_buttons.style.display = "none";
	computer_buttons.className += 'w3-animate-top';
	computer_buttons.className += ' w3-animate-zoom';

	show_computer_buttons.style.display = "block";

	computer_buttons_bar_space.style.display = "none";
}

function Show_Computer_Buttons() {
	var computer_buttons = document.getElementById(computer_buttons_id);
	var show_computer_buttons = document.getElementById(show_computer_buttons_id);
	var computer_buttons_bar_space = document.getElementById(computer_buttons_bar_space_id);

	computer_buttons.style.display = "block";
	computer_buttons.className = computer_buttons.className.replace("w3-animate-top", "");
	computer_buttons.className = computer_buttons.className.replace(" w3-animate-zoom", "");

	show_computer_buttons.style.display = "none";

	computer_buttons_bar_space.style.display = "block";
}

console.log("Show Hide Script was loaded.");