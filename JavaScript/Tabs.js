// Tabs.js

class Tabs_Class {
	"texts" = {
		"class_title": {
			"en": "Tabs",
			"pt": "Abas"
		},
		"opened_the_tab_with_id_{0}_title_{1}_and_number_{2}": {
			"en": 'Opened the tab with id "{0}", title "{1}", and number "{2}"',
			"pt": 'Aberto a aba com id "{0}", título "{1}", e número "{2}"'
		},
		"showed_the_hamburger_menu": {
			"en": 'Showed the hamburger menu',
			"pt": 'Mostrou o menu hambúrguer'
		},
		"hidden_the_hamburger_menu": {
			"en": 'Hidden the hamburger menu',
			"pt": 'Escondeu o menu hambúrguer'
		},
		"undefined": {
			"en": "Undefined",
			"pt": "Indefinido"
		}
	}
}

const Tabs = new Tabs_Class()

Tabs.language_texts = Language.Item(Tabs.texts)

Tabs.Class_Method = Class_Method(Tabs.texts["class_title"])

var tab, tabs, tab_number = 0

function Open_Tab(tab_id) {
	// Define the method title
	var method_title = {
		"en": arguments.callee.name,
		"pt": "Abrir_Aba"
	}

	// Get tab
	tab = document.getElementById(tab_id)

	// Get tabs
	tabs = Array.from(document.getElementsByClassName("tab"))

	// Hide all tabs
	tabs.forEach(
		function(item) {
			item.style.display = "none"
		}
	)

	// Show clicked tab
	w3.show("#" + tab_id)

	// Scroll to tab
	var tab_anchor = document.getElementById(tab_id + "_anchor")

	if (
		typeof tab_anchor != "undefined" &&
		tab_anchor != null
	) {
		tab_anchor.scrollIntoView(true)
	}

	else {
		tab.scrollIntoView(true)
	}

	// Get tab title
	tab_title_element = document.getElementById(tab_id + "_title")

	if (
		typeof tab_title_element != "undefined" &&
		tab_title_element != null
	) {
		var tab_title = String(document.getElementById(tab_id + "_title").innerHTML).split(": ")[0]
	}

	else {
		var tab_title = Tabs.language_texts["undefined"]
	}

	// Define tab number
	var i = 0
	while (i < tabs.length) {
		var local_tab_id = tabs[i].id

		if (local_tab_id == tab_id) {
			tab_number = i
		}

		i++
	}

	// Show information about the opened tab
	var text = format(Tabs.language_texts["opened_the_tab_with_id_{0}_title_{1}_and_number_{2}"], tab_id, tab_title, (tab_number + 1))

	Tabs.Class_Method(method_title, text)

	// Hide the hamburger menu
	w3.hide("#hamburger_menu")

	// Show the hamburger menu button
	w3.show("#hamburger_menu_button")

	// Get tab buttons
	var tab_buttons = Array.from(document.getElementsByClassName("tab_button"))

	// Show all tab buttons
	tab_buttons.forEach(
		function(item) {
			item.style.display = "block"
		}
	)

	// Get tab button from tab number
	tab_button = document.getElementById("button_" + (tab_number + 1))

	// Hide clicked tab button
	if (tab_button != null) {
		tab_button.style.display = "none"
	}

	return tab
}

function Show_Hamburger_Menu() {
	// Define the method title
	var method_title = {
		"en": arguments.callee.name,
		"pt": "Mostrar_Menu_Hambúrguer"
	}

	// Show the hamburger menu
	hamburger_menu = document.getElementById("hamburger_menu")
	hamburger_menu.style.display = "block"

	// Hide the hamburger menu button
	hamburger_menu_button = document.getElementById("hamburger_menu_button")
	hamburger_menu_button.style.display = "none"

	// Show information about showing the hamburger menu
	var text = Tabs.language_texts["showed_the_hamburger_menu"]

	Tabs.Class_Method(method_title, text)
}

function Hide_Hamburger_Menu() {
	// Define the method title
	var method_title = {
		"en": arguments.callee.name,
		"pt": "Esconder_Menu_Hambúrguer"
	}

	// Hide the hamburger menu
	hamburger_menu = document.getElementById("hamburger_menu")
	hamburger_menu.style.display = "none"

	// Show the hamburger menu button
	hamburger_menu_button = document.getElementById("hamburger_menu_button")
	hamburger_menu_button.style.display = "block"

	// Show information about hiding the hamburger menu
	var text = Tabs.language_texts["hidden_the_hamburger_menu"]

	Tabs.Class_Method(method_title, text)
}

// Open a tab by the URL
parameters = Object.fromEntries(  
	new URLSearchParams(window.location.search)
)

// Check if the "tab" key is prenset in the URL and open the tab if so
var tab_keys = [
	"tab",
	"aba"
]

tab_keys.forEach(
	function(key) {
		if (Object.keys(parameters).includes(key) == true) {
			var value = parameters[key]

			if (String(Number(value)) != "NaN") {
				value = Number(value)
			}

			window.addEventListener("load", function() {
				// Get the tab by tab number
				if (typeof value == "number") {
					tab = Array.from(document.getElementsByClassName("tab"))[value - 1]
				}

				// Get the tab by the tab id
				if (typeof value == "string") {
					tab = document.getElementById(value)
				}

				// Open the tab
				$("#" + tab.id).ready(function() {
					Open_Tab(tab.id)
				})
			})
		}
	}
)

// Create a event listener on "keyup" to open tabs
var tab_by_key = function(event) {
	// Define the elements where the keys will not work
	var disallowed_elements = [
		"input",
		"textarea"
	]

	// Define the target element tag name
	var tag_name = event.target.tagName.toLowerCase()

	var check = true

	// Do not check for a tab if the event target is a text area or input
	// (The user must want to select text)
	if (disallowed_elements.indexOf(tag_name) != -1) {
		check = false
	}

	if (check == true) {
		var left_arrow = 37, right_arrow = 39

		// If the left or right arrow is pressed
		if (
			event.keyCode === left_arrow ||
			event.keyCode === right_arrow
		) {
			// Prevent the default event
			event.preventDefault()

			// Define the supported modifier keys
			var supported_modifier_keys = [
				!!event.ctrlKey,
				!!event.shiftKey
			]

			var modifier_key_pressed = false

			// Check if modifiey key is pressed
			var i = 0
			while (i <= supported_modifier_keys.length) {
				var modifier_key = supported_modifier_keys[i]

				if (modifier_key == true) {
					modifier_key_pressed = true
				}

				i++
			}

			// If one of them is pressed, then check what key was pressed
			if (modifier_key_pressed == true) {
				// Get tabs
				var tabs = Array.from(document.getElementsByClassName("tab"))

				open = false

				if (
					event.keyCode === left_arrow ||
					event.keyCode === right_arrow
				) {
					open = true
				}

				// If the left arrow is pressed then define tab number as the previous tab
				if (event.keyCode === left_arrow) {
					// Only define as previous tab if the tab number is not zero (first tab) or first tab is open
					if (
						tab_number !== 0 ||
						tabs[0].style.display == "block"
					) {
						tab_number = Number(tab_number) - 1
					}

					// Else, if the tab number is zero, it will open the first tab
				}

				// If the right arrow is pressed then define tab number as the next tab
				if (event.keyCode === right_arrow) {
					// Only define as next tab if the tab number is not zero (first tab) or first tab is open
					if (
						tab_number !== 0 ||
						tabs[0].style.display == "block"
					) {
						tab_number = Number(tab_number) + 1
					}
				}

				// If either key is pressed, get the tab by the tab number and open the tab
				if (open == true) {
					// If the tab index exists
					if (tabs[tab_number] != undefined) {
						// Define the tab id
						tab_id = tabs[tab_number].id
						var tab = document.getElementById(tab_id)

						// Only open the tab if it is not open
						if (tab.style.display !== "block") {
							if (tab_id.includes("chapter_") == false) {
								Open_Tab(tab_id)
							}

							else {
								Open_Chapter(tab_id.split("chapter_")[1])
							}
						}
					}
				}
			}
		}
	}
}

// Add the "tab by key" event listener
document.addEventListener("keyup", tab_by_key)

// Show the "Loaded_Class" text
Loaded_Class(Tabs.texts["class_title"])