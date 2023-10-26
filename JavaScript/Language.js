// Language.js

// Define Language_Class for definition of language texts
class Language_Class {
	languages = {
		"user": String(navigator.website_language || navigator.userLanguage || navigator.language).split("-")[0],
		"meta": document.head.querySelector('[name="meta_language"]').content,
		"small": [
			"general",
			"pt",
			"en"
		],
		"full": {
			"general": "General",
			"pt": "Português",
			"en": "English"
		},
		"full_translated": {
			"general": {
				"pt": "Geral",
				"en": "General"
			},
			"pt": {
				"pt": "Português",
				"en": "Portuguese"
			},
			"en": {
				"pt": "Inglês",
				"en": "English"
			}
		},
		"full_to_small": {
			"General": "general",
			"Português": "pt",
			"English": "en"
		}
	}

	texts = {}
	language_texts = {}

	constructor() {
		this.Define_Texts()
	}

	Item(item) {
		if (this.languages["user"] in item) {
			return item[this.languages["user"]]
		}

		if (Object.keys(item).includes(this.languages["user"]) == false) {
			var dictionary = {}

			for (var i = 0; i < Object.keys(item).length; i++) {
				var key = Object.keys(item)[i]

				if (typeof item[key] === "object" && this.languages["user"] in item[key]) {
					dictionary[key] = item[key][this.languages["user"]]
				}

				if (typeof item[key] === "string") {
					dictionary[key] = item[key]
				}
			}

			return dictionary
		}
	}

	Define_Texts() {
		this.texts = {
			"class_title": {
				"en": "Language",
				"pt": "Idioma"
			},
			"javascript_the_{0}_class_was_loaded_file_{1}.js": {
				"en": 'JavaScript: The "{0}" class was loaded\nFile: "{1}.js"',
				"pt": 'JavaScript: A classe "{0}" foi carregada\nArquivo: "{1}.js"'
			},
			"{Class}.{Method}(): {Text}": {
				"en": '{0}.{1}(): {2}',
				"pt": '{0}.{1}(): {2}'
			},
			"undefined": {
				"en": "Undefined",
				"pt": "Indefinido"
			}
		}

		this.language_texts = this.Item(this.texts)
	}
}

// String format function
function format(text) {
	var args = arguments

	return text.replace(/{([0-9]+)}/g, function(match, index) {
		return args[Number(index) + 1]
	})
}

// Show text on console function (easier to type than "console.log")
function print(text) {
	console.log(text)
}

const Language = new Language_Class()

// Class_Method text displayer
function Class_Method(class_title) {
	var Show_Class_Method = function(method, text) {
		var local_class_title = class_title

		if (local_class_title.constructor == Object) {
			local_class_title = Language.Item(local_class_title)
		}

		if (method.constructor == Object) {
			method = Language.Item(method)
		}

		if (text.constructor == Object) {
			text = Language.Item(text)
		}

		print(format(local_class_title + ".{0}():\n\n{1}", method, text))
	}

	return Show_Class_Method
}

// Loaded_Class text displayer
function Loaded_Class(class_title) {
	var local_class_title = class_title

	var class_file = local_class_title["en"]

	if (local_class_title.constructor == Object) {
		local_class_title = Language.Item(local_class_title)
	}

	print(format(Language.language_texts["javascript_the_{0}_class_was_loaded_file_{1}.js"], local_class_title, class_file))
}

// Show the "Loaded_Class" text
Loaded_Class(Language.texts["class_title"])