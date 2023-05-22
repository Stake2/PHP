// Get the modal
var modal = document.getElementById("modal_element");

// Get the button that opens the modal
var btn = document.getElementById("modal_button");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
	modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
	modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
	if (event.target == modal) {
		modal.style.display = "none";
	}
}

// When the user presses the ESC key, close it
function Check_Modal_Key(event) {
	if (event.key == "Escape") {
		modal.style.display = "none";
	}
}

console.log("Modal Script was loaded.");