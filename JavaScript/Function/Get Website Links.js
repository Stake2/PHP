var english_language = "en-US";
var english_languages = ["en", "en-US", "en-BZ", "en-CA", "en-IE", "en-JM", "en-NZ", "en-PH", "en-ZA", "en-TT", "en-GB", "en-ZW"]

var portuguese_language = "pt-BR" || "pt-PT";
var portuguese_languages = ["pt", "pt-BR", "pt-PT"];

var languages_dict = {
	"PT-BR": "pt",
	"EN-US": "en",
}

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

var websites_tab = document.getElementById(Language_Item_Definer("Websites Tab", "Aba de Sites"));
var website_buttons = websites_tab.children[1].children[0].children[0].children[0].children[2].children[0];

var website_links = "";
var links = website_buttons.children;
var last_website_link = links[links.length - 2];

for (let item of links) {
    if (item.nodeName == "BUTTON") {
			var link = item.getAttribute("onclick").replace("window.open('", "");
      link = link.replace("');", "");

      if (link.includes("function") == false && link.includes("Copy") == false) {
				website_links += link;

        if (item != last_website_link) {
					website_links += "\n";
      	}
      }
    }
}

function Copy() {
	navigator.clipboard.writeText(website_links);
}

var button = document.createElement("button");
button.setAttribute('onClick', 'Copy();');
button.classList += 'w3-btn text_black background_second_dark_purple border_color_black border_3px background_hover_white';
button.innerHTML = `<h2>Copy website links</h2>`;
button.style = "border-radius: 50px;";

var h4 = websites_tab.children[1].children[0].children[0].children[0].children[2].children[0];
var last_h4_button = h4.children[h4.children.length - 1];

if (last_h4_button.getAttribute("onclick") != "Copy();") {
	h4.appendChild(button);
}