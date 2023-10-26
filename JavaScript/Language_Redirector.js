// Language_Redirector.js

class Language_Redirector_Class {
	"texts" = {
		"class_title": {
			"en": "Language_Redirector",
			"pt": "Redirecionador_De_Idioma"
		},
		"check, title()": {
			"en": "Check",
			"pt": "Checagem"
		},
		"website_title": {
			"en": "Website title",
			"pt": "Título do site"
		},
		"website_link": {
			"en": "Website link",
			"pt": "Link do site"
		},
		"website_language": {
			"en": "Website language",
			"pt": "Idioma do site"
		},
		"user_language": {
			"en": "User language",
			"pt": "Idioma do usuário"
		},
		"link, title()": {
			"en": "Link",
			"pt": "Link"
		},
		"new_link": {
			"en": "New link",
			"pt": "Novo link"
		},
		"the_user_is_in_the_{0}_redirecting_to_{1}_website": {
			"en": "The user is in the {0} website, redirecting to {1} website",
			"pt": "O usuário está no site {0}, redirecionando para o site em {1}"
		},
		"the_user_is_in_the_correct_website_for_their_language": {
			"en": "The user is in the correct website for their language",
			"pt": "O usuário está no site correto para seu idioma"
		}
	}
}

const Language_Redirector = new Language_Redirector_Class()

Language_Redirector.language_texts = Language.Item(Language_Redirector.texts)

Language_Redirector.Class_Method = Class_Method(Language_Redirector.texts["class_title"])

// Define website dictionary
var website = {
	"title": String(document.title),
	"link": String(window.location),
	"addon": ""
}

var languages = Language.languages

website["check"] = website["link"].includes("no-redirect=true")

// Define link addon (URL parameters)
var parameters = Object.fromEntries(  
	new URLSearchParams(window.location.search)
)

if (Object.keys(parameters).length !== 0) {
	website["addon"] += "?"
}

Object.keys(parameters).forEach(
	function(key) {
		website["addon"] += encodeURIComponent(key) + "=" + encodeURIComponent(parameters[key])

		if (key != Object.keys(parameters).slice(-1)) {
			website["addon"] += "&"
		}
	}
)

// Define the "Check_Language" function
function Check_Language() {
	// Define the method title
	var method_title = {
		"en": arguments.callee.name,
		"pt": "Verificar_Idioma"
	}

	var text = Language_Redirector.language_texts["website_title"] + ": " + '"{0}"' + "\n" +
	Language_Redirector.language_texts["website_link"] + ": " + "{1}" + "\n\n" +
	Language_Redirector.language_texts["user_language"] + ": " + "{2}" + "\n" +
	Language_Redirector.language_texts["website_language"] + ": " + "{3}"

	text = format(text, website["title"], website["link"], languages["full_translated"][languages["user"]][languages["user"]], languages["full_translated"][languages["full_to_small"][languages["meta"]]][languages["user"]])

	website["correct_language"] = true

	if (languages["meta"] != languages["full"][languages["user"]]) {
		website["correct_language"] = false
	}

	var meta_language = languages["full_translated"][languages["full_to_small"][languages["meta"]]][languages["user"]]
	var translated_user_language = languages["full_translated"][languages["user"]][languages["user"]]

	var add_text = format(Language_Redirector.language_texts["the_user_is_in_the_{0}_redirecting_to_{1}_website"] + "...", meta_language, translated_user_language)

	if (website["correct_language"] == true) {
		var add_text = Language_Redirector.language_texts["the_user_is_in_the_correct_website_for_their_language"] + "."
	}

	if (website["correct_language"] == false) {
		// Add slash if it is not present
		if (website["link"].slice(-1) != "/") {
			website["link"] += "/"
		}

		// Split the website link to remove parameters to remove addon
		if (website["link"].includes("?") == true) {
			website["link"] = website["link"].split("?")[0]
		}

		// Remove other languages that are not the user language from the website link
		Array.from(languages["small"]).forEach(
			function(language) {
				if (language != languages["user"] && website["link"].includes(language + "/")) {
					website["link"] = website["link"].replace(language + "/", "")
				}
			}
		)

		// Add user language
		if (website["link"].includes(languages["user"] + "/") == false) {
			website["link"] += languages["user"] + "/"
		}

		// Add addon
		if (website["link"].includes("?") == false) {
			website["link"] += website["addon"]
		}

		text += "\n" + Language_Redirector.language_texts["new_link"] + ": " + website["link"]
	}

	text += "\n\n" + Language_Redirector.language_texts["check, title()"] + ": " + add_text

	Language_Redirector.Class_Method(method_title, text)

	if (website["correct_language"] == false && website["check"] == false) {
		window.location = website["link"]
	}
}

// Show the "Loaded_Class" text
Loaded_Class(Language_Redirector.texts["class_title"])