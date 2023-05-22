var root_website_link = "https://thestake2-testing.netlify.app/";
var websites_list_text_files = root_website_link + "Texts/Websites%20List/";
var english_website_names_url = websites_list_text_files + "English%20Websites%20Array.txt";
var portuguese_website_names_url = websites_list_text_files + "Portuguese%20Websites%20Keyed.txt";

var user_language = navigator.website_language || navigator.userLanguage || navigator.language;
var website_language = user_language;

var title = document.getElementsByTagName("title")[0];
var website_title = String(title.innerHTML).replace("(1) ", "");

var meta_title = document.head.querySelector('[name="language_title"]').content;

var english_language = "en-US";
var english_languages = ["en", "en-US", "en-BZ", "en-CA", "en-IE", "en-JM", "en-NZ", "en-PH", "en-ZA", "en-TT", "en-GB", "en-ZW"]

var portuguese_language = "pt-BR" || "pt-PT";
var portuguese_languages = ["pt", "pt-BR", "pt-PT"];

var languages_dict = {
	"PT-BR": "pt",
	"EN-US": "en",
}

var current_website_link = String(window.location);
var check = current_website_link.includes("no-redirect=true");
var check_chapter_in_link = current_website_link.includes("[") || current_website_link.includes("(");

var url_addon = "";

if (check_chapter_in_link == true) {
	url_addon = current_website_link.split("/").reverse()[0];
}

var object;

async function Convert_Text_File_To_Object(url) {
	var x = await fetch(url);
	object = await x.text();

	return object;
}

var english_website_names, portuguese_website_names;

var current_year = new Date().getFullYear();
var year_websites = [];

for (year = 2018; year <= current_year; year++) {
	year_websites.push(year);
}

Convert_Text_File_To_Object(english_website_names_url).then(
	function(value) {
		english_website_names = JSON.parse(value);
		console.log(english_website_names);
	}
);

Convert_Text_File_To_Object(portuguese_website_names_url).then(
	function(value) {
		portuguese_website_names = JSON.parse(value);
		console.log(portuguese_website_names);
	}
).then(
	function() {
		english_website_names.forEach(Check_Language);
		year_websites.forEach(Check_Language);
	}
);

function Language_Item_Definer(english_text, portuguese_text) {
	var language_text;

	if (english_languages.includes(website_language) == true) {
		language_text = english_text;
	}

	if (portuguese_languages.includes(website_language) == true) {
		language_text = portuguese_text;
	}

	return language_text;
}

function English(language) {
	if (english_languages.includes(language) == true) {
		return true;
	}

	if (english_languages.includes(language) == false) {
		return false;
	}
}

function Portuguese(language) {
	if (portuguese_languages.includes(language) == true) {
		return true;
	}

	if (portuguese_languages.includes(language) == false) {
		return false;
	}
}

function Redirect(website_link) {
	var redirect = website_link + Language_Item_Definer("en", "pt", user_language) + "/" + url_addon;
	window.location = redirect;
}

function Check_Language(english_website_name) {
	var website_folder_name = english_website_name;

	if (english_website_name == "SpaceLiving") {
		website_folder_name = "New World/" + english_website_name;
	}

	if (english_website_name == "My Little Pony: Friendship Is Magic") {
		website_folder_name = "My Little Pony/Friendship Is Magic";
	}

	console.log(english_website_name);

	var website_link = root_website_link + website_folder_name + "/"
	var portuguese_website_name = portuguese_website_names[String(english_website_name).replace(/ /gi, "_").toLowerCase()];

	if (meta_title == english_website_name) {
		console.log(Language_Item_Definer("The user is in the index website, redirecting to user language website", "O usuário está no site raíz, redirecionando para o site do idioma") + "...");

		if (check == false) {
			Redirect(website_link);
		}
	}

	if (meta_title == english_website_name + " English") {
		if (Portuguese(user_language) == true) {
			console.log(Language_Item_Definer("The user is in the English website, redirecting to Portuguese language website", "O usuário está no site em Inglês, redirecionando para o site em idioma Português") + "...");

			if (check == false) {
				Redirect(website_link);
			}
		}

		else {
			console.log(Language_Item_Definer("The user is in the correct website for their language", "O usuário está no site correto para seu idioma") + ".");
		}
	}

	if (meta_title == english_website_name + " Português") {
		if (English(user_language) == true) {
			console.log(Language_Item_Definer("The user is in the Portuguese website, redirecting to English language website", "O usuário está no site em Português, redirecionando para o site em idioma Inglês") + "...");

			if (check == false) {
				Redirect(website_link);
			}
		}

		else {
			console.log(Language_Item_Definer("The user is in the correct website for their language", "O usuário está no site correto para seu idioma") + ".");
		}
	}
}