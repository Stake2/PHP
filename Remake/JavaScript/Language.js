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
			"script_name": "Language",
			"language_script_name": {
				"en": "Language",
				"pt": "Idioma",
			},
			"javascript_{0}_script_was_loaded": {
				"en": 'JavaScript: "{0}.js" script was loaded.',
				"pt": 'JavaScript: O script "{0}.js" foi carregado.',
			},
		}

		this.language_texts = this.Item(this.texts)
	}
}

// JavaScript String format function
function format(text) {
	var args = arguments

	return text.replace(/{([0-9]+)}/g, function(match, index) {
		return args[Number(index) + 1]
	})
}

function print(text) {
	console.log(text)
}

const Language = new Language_Class()

print(format(Language.language_texts["javascript_{0}_script_was_loaded"], Language.language_texts["language_script_name"]))