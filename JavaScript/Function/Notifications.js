var user_language = navigator.language || navigator.userLanguage;

// Defines the button text if the user language is English
if (user_language == "en-US") {
	var button_text = "Okay, byeeeee...";
}

// Defines the button text if the user language is Brazilian Portuguese or European Portuguese
if (user_language == "pt-BR" || user_language == "pt-PT") {
	var button_text = "Tudo beeeeem...";
}

else {
	var button_text = "Okay, byeeeee...";
}

// Gets the div element
var notification_div_computer = document.getElementById("notification_div_computer");

// Gets the close button for the div element
var notification_close_button_computer;

notification_close_button_computer = document.getElementById("notification_close_button_computer");

//  Gets the div element
var notification_div_mobile = document.getElementById("notification_div_mobile");

// Gets the close button for the div element
var notification_close_button_mobile;

notification_close_button_mobile = document.getElementById("notification_close_button_mobile");

// When the user clicks on the click button, it will run this function
notification_close_button_computer.onclick = function() {
	Hide_Computer_Notification();
}

// When the user clicks on the click button, it will run this function
notification_close_button_mobile.onclick = function() {
	Hide_Mobile_Notification();
}

console.log("Notification Script was loaded.");

function Hide_Computer_Notification() {
	var notification_div_computer = document.getElementById("notification_div_computer");
	var notification_close_button_computer = document.getElementById("notification_close_button_computer");

	// Animates the div element from top to bottom, hiding it
	notification_div_computer.className = notification_div_computer.className.replace("element_appear_from_bottom", "element_disappear_to_bottom");

	// Changes the text of the div element
	notification_div_computer.innerHTML = '<h2 width="60%">' + button_text + "</h2>";

	// Hides the div element after the animation has stopped
	setTimeout(function() {
		notification_div_computer.style.display = "none";
	}, 10000);

	document.title = document.title.replace("(1) ", "");
}

function Hide_Mobile_Notification() {
	var notification_div_mobile = document.getElementById("notification_div_mobile");
	var notification_close_button_mobile = document.getElementById("notification_close_button_mobile");

	// Animates the div element from top to bottom, hiding it
	notification_div_mobile.className = notification_div_mobile.className.replace("element_appear_from_bottom", "element_disappear_to_bottom");

	// Changes the text of the div element
	notification_div_mobile.innerHTML = '<h2 width="60%">' + button_text + "</h2>";

	// Hides the div element after the animation has stopped
	setTimeout(function() {
		notification_div_mobile.style.display = "none";
	}, 10000);

	document.title = document.title.replace("(1) ", "");
}

console.log("Hide Notification Script was loaded.");