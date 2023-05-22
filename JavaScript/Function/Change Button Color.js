var button_background, new_button_background, button_number

function print(text) {
	console.log(text)
}

function Define_Colors_And_Styles() {
	new_button_background = document.getElementById("click_button_background").textContent
	button_background = document.getElementById("button_background").textContent
	button_number = document.getElementById("button_number").textContent
}

function Change_Class(button_id, id_parameter, find = button_background, change = new_button_background) {
	var i = 0
	var length = button_number
	while (i <= length) {
		id = id_parameter

		if (id_parameter.slice(-1) == "_") {
			id = id_parameter + (i + 1)
		}

		button = null

		if (id != "websites_tab_button") {
			button = document.getElementById(id)
		}

		if (button != null) {
			if (i == button_id - 1) {
				if (button.classList.contains(find) == true && button.classList.contains(change) == false) {
					button.classList.toggle(find)
					button.classList.add(change)
				}
			}

			if (i != button_id - 1) {
				if (button.classList.contains(change) == true && button.classList.contains(find) == false) {
					button.classList.toggle(change)
					button.classList.add(find)
				}
			}
		}

		i += 1
	}

	if (id_parameter == "websites_tab_button") {
		button = document.getElementById(id_parameter)

		if (button_id == button && button.classList.contains(find) == true) {
			button.classList.toggle(find)
			button.classList.add(change)
		}

		if (button_id != button && button.classList.contains(change) == true) {
			button.classList.toggle(change)
			button.classList.add(find)
		}
	}
}

function Change_Button_Color(button_id) {
	Change_Class(button_id, "computer_button_")
	Change_Class(button_id, "mobile_button_")
	Change_Class(button_id, "watched_archived_button_")
	Change_Class(button_id, "websites_tab_button")
}

console.log("Change Button Color Script was loaded.")