// Functions.js

var Functions = {
	"texts": {
		"class_title": {
			"en": "Functions",
			"pt": "Funções"
		}
	}
}

Functions.language_texts = Language.Item(Functions.texts)

Functions.Class_Method = Class_Method(Functions.texts["class_title"])

// Functions that are used on various websites

// Remove the zoom class after the page has been loaded
function Remove_Zoom() {
	// Define the method title
	var method_title = {
		"en": arguments.callee.name,
		"pt": "Remover_Zoom"
	}

	// Define the verbose title
	var text = {
		"en": 'The "w3-animate-zoom" class was removed from the buttons (removed zoom animation of buttons)',
		"pt": 'A classe "w3-animate-zoom" foi removida dos botões (removida animação de zoom dos botões)'
	}

	// Get all elements with the "w3-animate-zoom" class
	array = Array.from(document.getElementsByClassName("w3-animate-zoom"))

	array.forEach(
		function(element) {
			if (element.tagName == "BUTTON") {
				element.classList.toggle("w3-animate-zoom")
			}
		}
	)

	Class_Method(method_title, text)
}

// Click on input button part
function Click_Input(array)	{
	// Define the method title
	var method_title = {
		"en": arguments.callee.name,
		"pt": "Clicar_Input"
	}

	var array = Array.from(array)

	// Iterate through elements list
	array.forEach(
		function(item) {
			// If element is Input element, click it
			if (item.tagName == "INPUT") {
				item.click()

				var text = {
					"en": "Clicking on the Input element in a Div",
					"pt": "Clicando no elemento Input em uma Div"
				}

				Class_Method(method_title, text)
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
	// Define the method title
	var method_title = {
		"en": arguments.callee.name,
		"pt": "Adicionar_Zeros_À_Esquerda"
	}

	var old_number = number

	var text = {
		"en": "Did not added leading zeros to this number: {0}",
		"pt": "Não adicionou zeros à esquerda à este número: {0}"
	}

	if (number <= 9) {
		text = {
			"en": "Added leading zeros to this number: {0}",
			"pt": "Adicionou zeros à esquerda à este número: {0}"
		}

		number = "0" + String(number)
	}

	Class_Method(method_title, format(text, number))
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

// Hide hamburger buttons menu when scrolling down
// Show hamburger buttons menu when scrolling up
var hamburger_menu_button = document.getElementById("hamburger_menu_button")
var last_scroll = window.scrollY

function Check_Page_Scrolling() {
	// Define the method title
	var method_title = {
		"en": arguments.callee.name,
		"pt": "Verificar_Rolagem_Da_Página"
	}

	var window_Y = window.scrollY

	// Scrolling up
	if (window_Y < last_scroll) {
		var text = {
			"en": "The user scrolled the page up, showing the hamburger menu button",
			"pt": "O usuário rolou a página para cima, mostrando o botão do menu hambúrguer"
		}

		w3.show("#hamburger_menu_button")
		w3.addClass("#hamburger_menu_button", "w3-animate-zoom")
	}

	// Scrolling down
	if (window_Y > last_scroll) {
		var text = {
			"en": "The user scrolled the page down, hiding the hamburger menu button",
			"pt": "O usuário rolou a página para baixo, escondendo o botão do menu hambúrguer"
		}

		w3.hide("#hamburger_menu_button")
		w3.removeClass("#hamburger_menu_button", "w3-animate-zoom")
	}

	last_scroll = window.scrollY

	Class_Method(method_title, text)
}

// Add the event listener
window.addEventListener("scroll", Check_Page_Scrolling)

// Show the "Loaded_Class" text
Loaded_Class(Functions.texts["class_title"])