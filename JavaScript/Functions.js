// Functions.js

// Functions that are used on various websites

// Remove zoom class after page has been loaded
function Remove_Zoom() {
	array = Array.from(document.getElementsByClassName("w3-animate-zoom"))

	array.forEach(
		function(element) {
			if (element.tagName == "BUTTON") {
				element.classList.toggle("w3-animate-zoom")
			}
		}
	)

	var text = {
		"en": 'The "w3-animate-zoom" class was removed from the buttons (removed zoom animation of buttons)',
		"pt": 'A classe "w3-animate-zoom" foi removida dos botões (removida animação de zoom dos botões)'
	}

	print("Functions.Remove_Zoom(): " + Language.Item(text) + ".")
}

// Click on input button part
function Click_Input(array)	{
	var array = Array.from(array)

	// Iterate through elements list
	array.forEach(
		function(item) {
			// If element is Input element, click it
			if (item.tagName == "INPUT") {
				item.click()
			}
		}
	)
}

// Get divs from page
var divs = document.getElementsByTagName("div")

// Transform divs into array
var array = Array.from(divs)

array.forEach(
	function(div) {
		// Checks if div contains the "input" element
		var add = false

		var children = Array.from(div.children)

		children.forEach(
			function(item) {
				if (item.tagName == "INPUT") {
					add = true
				}
			}
		)

		// Add "click" event listener if div contains the "input" element
		if (add == true) {
			div.addEventListener("click", 
				function(event) {
					// If target is a div, define array as the children of the div 
					if (event.target.tagName == "DIV") {
						var array = event.target.children
					}

					// If target is not a div, define array as the children of the parent element (which is probably the div)
					else {
						var parent = event.target.parentElement

						// If parent is a div, define array as the children of the div
						if (parent.tagName == "DIV") {
							var array = parent.children
						}

						// If parent is not a div, define parent as the parent of the parent element
						// Define the array as the children of the parent element (which is probably now the div)
						else {
							var parent = parent.parentElement

							var array = parent.children
						}
					}

					// Finds the input button and clicks it
					Click_Input(array)
				}
			)
		}
	}
)

// Add leading zeroes to number
function Add_Leading_Zeroes(number) {
	if (number <= 9) {
		return "0" + String(number)
	}

	if (number > 9) {
		return number
	}
}

// Add text gotten from file to element
function Add_Text_To_Element(url, element) {
	var request = new XMLHttpRequest()
	request.open("GET", url, true)
	request.send()
	request.onreadystatechange = process

	function process(event) {
		element.innerHTML = event.target.response
	}
}

var script_name = {
	"en": "Functions",
	"pt": "Funções"
}

print(format(Language.language_texts["javascript_{0}_script_was_loaded"], Language.Item(script_name)))