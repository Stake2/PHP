// Story.js

class Story_Class {
	"texts" = {
		"class_title": {
			"en": "Story",
			"pt": "História"
		},
		"chapter, title()": {
			"en": "Chapter",
			"pt": "Capítulo"
		},
		"chapters, title()": {
			"en": "Chapters",
			"pt": "Capítulos"
		},
		"opening_chapter_with_number_{0}_and_title_{1}": {
			"en": 'Opening chapter with number "{0}" and title "{1}"',
			"pt": 'Abrindo capítulo com número "{0}" e título "{1}"'
		},
		"opened_the_chapter_tab": {
			"en": 'Opened the chapter tab',
			"pt": 'Aberto a aba do capítulo'
		},
		"defined_chapter_with_number_{0}_and_title_{1}": {
			"en": 'Defined chapter with number "{0}" and title "{1}"',
			"pt": 'Definido capítulo com número "{0}" e título "{1}"'
		},
		"opened_the_modal_tab_with_id_{0}": {
			"en": 'Opened the modal tab with id "{0}"',
			"pt": 'Aberto a aba modal com id "{0}"'
		},
		"hiding_this_modal_{0}": {
			"en": 'Hiding this modal "{0}"',
			"pt": 'Escondendo este modal "{0}"'
		},
		"reading_this_chapter_file_to_get_the_chapter_text_{0}": {
			"en": 'Reading this chapter file to get the chapter text:\n{0}',
			"pt": 'Lendo este arquivo de capítulo para pegar o texto do capítulo\n{0}'
		},
		"scrolled_to_the_write_chapter_element_to_write": {
			"en": 'Scrolled to the "write chapter" element to write',
			"pt": 'Descido até o elemento "escrever capítulo" para escrever'
		}
	}
}

const Story = new Story_Class()

Story.language_texts = Language.Item(Story.texts)

Story.Class_Method = Class_Method(Story.texts["class_title"])

// Define the chapter number, website title and set the website URL backup
var chapter_title, chapter_tab_id, chapter_number = 0, chapter_title_element

website["backup"] = String(document.title)

// Function to define chapter number and title
function Define_Chapter(number, chapter_title) {
	// Define the method title
	var method_title = {
		"en": arguments.callee.name,
		"pt": "Definir_Capítulo"
	}

	// Define the chapter number
	chapter_number = Number(number)

	// Define the chapter title element
	chapter_title_element = document.getElementById(chapter_tab_id + "_title")

	if (chapter_title_element != null) {
		chapter_title = chapter_title_element.innerHTML

		// Add the chapter title to the website title
		document.title = website["backup"] + " - " + Story.language_texts["chapter, title()"] + ":"

		document.title = document.title + " " + chapter_title

		// Show information about the defined chapter
		var text = format(Story.language_texts["defined_chapter_with_number_{0}_and_title_{1}"], number, chapter_title.split(" - ")[1])

		return text
	}

	else {
		return null
	}
}

// Function to define chapter number and title, show "opening chapter" text, and open chapter tab
function Open_Chapter(number, chapter_title) {
	// Define the method title
	var method_title = {
		"en": arguments.callee.name,
		"pt": "Abrir_Capítulo"
	}

	// Define the chapter tab id
	chapter_tab_id = "chapter_" + number

	// Define chapter and change website title
	var text = Define_Chapter(number, chapter_title)

	if (text != null) {
		// Scroll to the "write chapter" text area if it exists
		if ($("#chapter_" + number + "_write_anchor").length) {
			setTimeout(function() {
				// Scroll to the "write chapter" text area
				$("#chapter_" + number + "_write_anchor").get(0).scrollIntoView()

				// Resize the text area by triggering a input in it
				$("#chapter_" + number + "_write_textarea").trigger("input")
			}, 400)

			text += "\n" + Story.language_texts["scrolled_to_the_write_chapter_element_to_write"]
		}

		// Show information about the chapter
		text += "\n" + Story.language_texts["opened_the_chapter_tab"]

		Story.Class_Method(method_title, text)

		// Open the chapter tab
		Open_Tab(chapter_tab_id)

		// Load the chapter text from the file
		//Load_Chapter(chapter_tab_id, number)
	}
}

// Open a chapter tab by the URL
parameters = Object.fromEntries(  
	new URLSearchParams(window.location.search)
)

// Check if the "chapter" key is prenset in the URL and open the chapter tab if so
var chapter_keys = [
	"chapter",
	"capítulo",
	"capitulo"
]

chapter_keys.forEach(
	function(key) {
		if (Object.keys(parameters).includes(key) == true) {
			chapter_tab_id = 'chapter_' + parameters[key]

			$("#" + chapter_tab_id).ready(function() {
				Open_Chapter(parameters[key])
			})
		}
	}
)

// Function to open comment or read modal and show that opened the modal on the console
function Open_Modal(id, chapter_title) {
	// Define the method title
	var method_title = {
		"en": arguments.callee.name,
		"pt": "Abrir_Modal"
	}

	id = "chapter_" + id

	// Open modal tab
	var modal_tab = document.getElementById(id)

	// Show modal tab
	w3.show("#" + id)

	// Scroll to modal tab
	var modal_anchor = document.getElementById(id + "_anchor")

	if (
		typeof modal_anchor != "undefined" &&
		modal_anchor != null
	) {
		modal_anchor.scrollIntoView(true)
	}

	else {
		modal_tab.scrollIntoView(true)
	}

	// Show information about the shown modal
	var text = format(Story.language_texts["opened_the_modal_tab_with_id_{0}"], id)

	Story.Class_Method(method_title, text)

	// Update chapter title to show on modal
	var chapter_title_element = document.getElementById(id + "_title")

	chapter_title_element.innerHTML = chapter_title

	// Update chapter value of input
	var chapter_title_value = document.getElementById(id + "_value")

	chapter_title_value.setAttribute("value", chapter_title)

	modal_tab.tabIndex = "-1"
	modal_tab.focus()
}

// Hide the modal
function Hide_Modal(id) {
	id = "chapter_" + id

	var modal = document.getElementById(id)

	// Hide the modal tab
	modal.style.display = "none"
}

// Add click event listener to hide modal when user clicks outside modal-content
document.addEventListener("click", function(event) {
	if (
		String(event.target.id).includes("chapter_comment") ||
		String(event.target.id).includes("chapter_read")
	) {
		event.preventDefault()

		// Define the method title
		var method_title = {
			"en": "Hide_Modal_By_Click",
			"pt": "Esconder_Modal_Por_Clique"
		}

		// Show information about the hiddem modal
		var text = format(Story.language_texts["hiding_this_modal_{0}"], String(event.target.id))

		Story.Class_Method(method_title, text)

		event.target.style.display = "none"
		document.activeElement.blur()
	}
})

// Add chapter text to chapter text element
function Load_Chapter(chapter_tab_id, chapter_number) {
	// Define the method title
	var method_title = {
		"en": arguments.callee.name,
		"pt": "Carregar_Capítulo"
	}

	var chapter_text_element = document.getElementById(chapter_tab_id + "_text")

	var link = website["link"]

	// Split link to remove parameters
	if (link.includes("?") == true) {
		link = link.split("?")[0]
	}

	// Get chapter file on website folder
	var chapter_file = link + "Chapters/" + Add_Leading_Zeroes(chapter_number) + ".txt"

	// Show information about the chapter file
	var text = format(Story.language_texts["reading_this_chapter_file_to_get_the_chapter_text_{0}"], chapter_file)

	Story.Class_Method(method_title, text)

	// Add chapter text to chapter text element
	Add_Text_To_Element(chapter_file, chapter_text_element)
}

// Show the "Loaded_Class" text
Loaded_Class(Story.texts["class_title"])