// When the user presses the ESC key, close the modal
function Check_Modal_Key(event) {
	if (event.key == "Escape") {
		if (
		String(event.target.id).includes("comment-modal-") ||
		String(event.target.id).includes("read-modal-")
		) {
			console.log("Hiding this modal:");
			console.log(event.target);

			event.target.style.display = "none";
			document.activeElement.blur();
		}
	}
}