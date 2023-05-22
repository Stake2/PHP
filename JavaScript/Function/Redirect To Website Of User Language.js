var root_website_link = "https://thestake2.netlify.app/";

var user_language = navigator.website_language || navigator.userLanguage || navigator.language;

var title = document.getElementsByTagName("title")[0];
var website_title = title.innerHTML;

var url_addon;
var english_language = "en-US";
var english_languages = ["en", "en-US", "en-BZ", "en-CA", "en-IE", "en-JM", "en-NZ", "en-PH", "en-ZA", "en-TT", "en-GB", "en-ZW"]

var portuguese_language = "pt-BR" || "pt-PT";
var portuguese_languages = ["pt", "pt-BR", "pt-PT"];

function Language_Item_Definer(english_text, portuguese_text, website_language) {
	var language_text;

	if (english_languages.includes(website_language) == true) {
		language_text = english_text;
	}

	if (portuguese_languages.includes(website_language) == true) {
		language_text = portuguese_text;
	}

	return language_text;
}

function English_Language_Check(language) {
	if (english_languages.includes(language) == true) {
		return true;
	}

	if (english_languages.includes(language) == false) {
		return false;
	}
}

function Portuguese_Language_Check(language) {
	if (portuguese_languages.includes(language) == true) {
		return true;
	}

	if (portuguese_languages.includes(language) == false) {
		return false;
	}
}

function Redirect(website_link) {
	var redirect = website_link + Language_Item_Definer("EN-US", "PT-BR", user_language) + "/" + url_addon;
	window.location = redirect;
}

var current_website_link = String(window.location);
var check = current_website_link.includes("no-redirect=true");
var check_chapter_in_link = current_website_link.includes("[") || current_website_link.includes("(");

url_addon = "";

if (check_chapter_in_link == true) {
	url_addon = current_website_link.split("/").reverse()[0];
}

function Check_Website_Link() {
	var website_name = "Diary";
	var website_link = root_website_link + website_name + "/"

	if (website_title == website_name && check == false) {
		Redirect(website_link)
	}

	if (website_title == website_name + " EN-US" && check == false) {
		if (Portuguese_Language_Check(user_language).includes(user_language) == True) {
			Redirect(website_link)
		}
	}

	if (website_title == website_name + " PT-BR" && check == false) {
		if (English_Language_Check(user_language).includes(user_language) == True) {
			Redirect(website_link)
		}
	}

	var website_name = "Diary Slim";

	if (website_title == website_name + " General" && check == false) {
		var website_language = "General";

		if (user_language == website_language) {
			return;
		}

		if (user_language != website_language) {
			var choosen_website_url = root_website_link + website_name + "/";
			var res = choosen_website_url + user_language + "/";
			window.location = res;
		}
	}

	if (website_title == website_name && check == false) {
		website_language = "en-US";

		if (user_language == website_language) {
			return;
		}

		if (user_language != website_language) {
			var choosen_website_url = root_website_link + website_name + "/";
			var res = choosen_website_url + user_language + "/";
			window.location = res;
		}
	}

	if (website_title == website_name && check == false) {
		website_language = "pt-BR";

		if (user_language == website_language) {
			return;
		}

		if (user_language != website_language) {
			var choosen_website_url = root_website_link + website_name + "/";
			var res = choosen_website_url + user_language + "/";
			window.location = res;
		}
	}

	if (website_title == website_name + " PT-PT" && check == false) {
		website_language = "pt-PT";

		if (user_language == website_language) {
			return;
		}

		if (user_language != website_language) {
			var choosen_website_url = root_website_link + website_name + "/";
			var res = choosen_website_url + user_language + "/";
			window.location = res;
			var thiss = that;
		}
	}

	var website_name = "Watch History";

	if (website_title == website_name && check == false) {
		var website_language = "General";
	
		if (user_language == website_language) {
			return;
		}

		if (user_language != website_language) {
			var choosen_website_url = root_website_link + website_name + "/";
			var res = choosen_website_url + user_language.toLowerCase() + "/";
			window.location = res;
		}
	}

	if (website_title == website_name + " EN-US" && check == false) {
		var website_language = "en-US";

		if (user_language == website_language) {
			return;
		}

		if (user_language != website_language) {
			var choosen_website_url = root_website_link + website_name + "/";
			var res = choosen_website_url + user_language.toLowerCase() + "/";
			window.location = res;
		}
	}

	if (website_title == website_name + " PT-BR" && check == false) {
		var website_language = "pt-BR";

		if (user_language == website_language) {
			return;
		}

		if (user_language != website_language) {
			var choosen_website_url = root_website_link + website_name + "/";
			var res = choosen_website_url + user_language.toLowerCase() + "/";
			window.location = res;
		}
	}

	if (website_title == website_name + " PT-PT" && check == false) {
		var website_language = "pt-PT";

		if (user_language == website_language) {
			return;
		}

		if (user_language != website_language) {
			var choosen_website_url = root_website_link + website_name + "/";
			var res = choosen_website_url + user_language.toLowerCase() + "/";
			window.location = res;
		}
	}

	var english_website_name = "My Little Pony: Friendship Is Magic";
	var portuguese_website_name = "My Little Pony: A Amizade É Mágica";

	if (website_title == english_website_name + " General" && check == false) {
		var website_language = "General";

		if (website_language == user_language) {
			return;
		}

		else {
			if (user_language == english_language) {
				var choosen_website_url = root_website_link + english_website_name.replace(":", "") + "/";
				var redirect_to = choosen_website_url + user_language + "/" + url_addon;
				window.location = redirect_to;
				return;
			}

			if (user_language == portuguese_language) {
				var choosen_website_url = root_website_link + portuguese_website_name.replace(":", "") + "/";
				var redirect_to = choosen_website_url + user_language + "/" + url_addon;
				window.location = redirect_to;
				return;
			}
		}
	}

	if (website_title == english_website_name && check == false) {
		var website_language = "en-US";

		if (website_language == user_language) {
			return;
		}

		else {
			if (user_language == english_language) {
				var choosen_website_url = root_website_link + english_website_name.replace(":", "") + "/";
				var redirect_to = choosen_website_url + user_language + "/" + url_addon;
				window.location = redirect_to;
				return;
			}

			if (user_language == portuguese_language) {
				var choosen_website_url = root_website_link + portuguese_website_name.replace(":", "") + "/";
				var redirect_to = choosen_website_url + user_language + "/" + url_addon;
				window.location = redirect_to;
				return;
			}
		}
	}

	if (website_title == portuguese_website_name && check == false) {
		var website_language = "pt-BR";

		if (website_language == user_language) {
			return;
		}

		else {
			if (user_language == english_language) {
				var choosen_website_url = root_website_link + english_website_name.replace(":", "") + "/";
				var redirect_to = choosen_website_url + user_language + "/" + url_addon;
				window.location = redirect_to;
				return;
			}

			if (user_language == portuguese_language) {
				var choosen_website_url = root_website_link + portuguese_website_name.replace(":", "") + "/";
				var redirect_to = choosen_website_url + user_language + "/" + url_addon;
				window.location = redirect_to;
				return;
			}
		}
	}

	if (website_title == portuguese_website_name + " PT-PT" && check == false) {
		var website_language = "pt-PT";

		if (website_language == user_language) {
			return;
		}

		else {
			if (user_language == english_language) {
				var choosen_website_url = root_website_link + english_website_name.replace(":", "") + "/";
				var redirect_to = choosen_website_url + user_language + "/" + url_addon;
				window.location = redirect_to;
				return;
			}

			if (user_language == portuguese_language) {
				var choosen_website_url = root_website_link + portuguese_website_name.replace(":", "") + "/";
				var redirect_to = choosen_website_url + user_language + "/" + url_addon;
				window.location = redirect_to;
				return;
			}
		}
	}

	if (website_title == "Things I Do Geral" && check == false) {
		var website_language = "General";

		if (user_language == website_language) {
			return;
		}

		if (user_language != website_language) {
			var choosen_website_url = root_website_link + "Things_I_do" + "/";
			var res = choosen_website_url + user_language.toLowerCase() + "/";
			window.location = res;
		}
	}

	if (website_title == "Things I Do EN-US" && check == false) {
		var website_language = "en-US";

		if (user_language == website_language) {
			return;
		}

		if (user_language != website_language) {
			var choosen_website_url = root_website_link + "Things_I_do" + "/";
			var res = choosen_website_url + user_language.toLowerCase() + "/";
			window.location = res;
		}
	}

	if (website_title == "Coisas que eu faço" && check == false) {
		var website_language = "pt-BR";

		if (user_language == website_language) {
			return;
		}

		if (user_language != website_language) {
			var choosen_website_url = root_website_link + "Coisas_que_eu_faço" + "/";
			var res = choosen_website_url + user_language.toLowerCase() + "/";
			window.location = res;
		}
	}

	if (website_title == "2018" && check == false) {
		var website_language = "General";

		if (user_language == website_language) {
			return;
		}

		if (user_language != website_language) {
			var choosen_website_url = root_website_link + "Years/" + "2018" + "/";
			var res = choosen_website_url + user_language.toLowerCase() + "/";
			window.location = res;
		}
	}

	if (website_title == "2018 EN-US" && check == false) {
		var website_language = "en-US";

		if (user_language == website_language) {
			return;
		}

		if (user_language != website_language) {
			var choosen_website_url = root_website_link + "Years/" + "2018" + "/";
			var res = choosen_website_url + user_language.toLowerCase() + "/";
			window.location = res;
		}
	}

	if (website_title == "2018 PT-BR" && check == false) {
		var website_language = "pt-BR";

		if (user_language == website_language) {
			return;
		}

		if (user_language != website_language) {
			var choosen_website_url = root_website_link + "Years/" + "2018" + "/";
			var res = choosen_website_url + user_language + "/";
			window.location = res;
		}
	}

	if (website_title == "Littletato - Pequenata" && check == false) {
		var website_language = "General";

		if (website_language == user_language) {
			return;
		}

		else {
			if (user_language == english_language) {
				var choosen_website_url = root_website_link + "The Life of Littletato/";
				var redirect_to = choosen_website_url + user_language + "/" + url_addon;
				window.location = redirect_to;
				return;
			}

			if (user_language == portuguese_language) {
				var choosen_website_url = root_website_link + "A Vida de Pequenata/";
				var redirect_to = choosen_website_url + user_language + "/" + url_addon;
				window.location = redirect_to;
				return;
			}
		}
	}

	if (website_title == "The Life of Littletato" && check == false) {
		var website_language = "en-US";

		if (website_language == user_language) {
			return;
		}

		else {
			if (user_language == english_language) {
				var choosen_website_url = root_website_link + "The Life of Littletato/";
				var redirect_to = choosen_website_url + user_language + "/" + url_addon;
				window.location = redirect_to;
				return;
			}

			if (user_language == portuguese_language) {
				var choosen_website_url = root_website_link + "A Vida de Pequenata/";
				var redirect_to = choosen_website_url + user_language + "/" + url_addon;
				window.location = redirect_to;
				return;
			}
		}
	}

	if (website_title == "A Vida de Pequenata" && check == false) {
		var website_language = "pt-BR";

		if (website_language == user_language) {
			return;
		}

		else {
			if (user_language == english_language) {
				var choosen_website_url = root_website_link + "The Life of Littletato/";
				var redirect_to = choosen_website_url + user_language + "/" + url_addon;
				window.location = redirect_to;
				return;
			}

			if (user_language == portuguese_language) {
				var choosen_website_url = root_website_link + "A Vida de Pequenata/";
				var redirect_to = choosen_website_url + user_language + "/" + url_addon;
				window.location = redirect_to;
				return;
			}
		}
	}

	if (website_title == "A Vida de Pequenata PT-PT" && check == false) {
		var website_language = "pt-PT";

		if (website_language == user_language) {
			return;
		}

		else {
			if (user_language == english_language) {
				var choosen_website_url = root_website_link + "The Life of Littletato/";
				var redirect_to = choosen_website_url + user_language + "/" + url_addon;
				window.location = redirect_to;
				return;
			}

			if (user_language == portuguese_language) {
				var choosen_website_url = root_website_link + "A Vida de Pequenata/";
				var redirect_to = choosen_website_url + user_language + "/" + url_addon;
				window.location = redirect_to;
				return;
			}
		}
	}

	var website_name = "New World";
	if (website_title == website_name && check == false) {
		var website_language = "General";

		if (website_language == user_language) {
			return;
		}

		if (website_language != user_language) {
			var choosen_website_url = root_website_link + "New World/";
			var res = choosen_website_url + user_language + "/";
			window.location = res;
			return;
		}
	}

	if (website_title == website_name + " EN-US" && check == false) {
		var website_language = "en-US";

		if (website_language == user_language) {
			return;
		}

		if (website_language != user_language) {
			var choosen_website_url = root_website_link + "New World/";
			var res = choosen_website_url + user_language + "/";
			window.location = res;
			return;
		}
	}

	if (website_title == website_name + " PT-BR" && check == false) {
		var website_language = "pt-BR";

		if (website_language == user_language) {
			return;
		}

		if (website_language != user_language) {
			var choosen_website_url = root_website_link + "New World/";
			var res = choosen_website_url + user_language + "/";
			window.location = res;
			return;
		}
	}

	if (website_title == website_name + " PT-PT" && check == false) {
		var website_language = "pt-PT";

		if (website_language == user_language) {
			return;
		}

		if (website_language != user_language) {
			var choosen_website_url = root_website_link + "New World/";
			var res = choosen_website_url + user_language + "/";
			window.location = res;
			return;
		}
	}

	var website_name = "SpaceLiving";
	if (website_title == website_name && check == false) {
		var website_language = "General";

		if (website_language == user_language) {
			return;
		}

		else {
			var choosen_website_url = root_website_link + "New World/SpaceLiving/";
			var redirect_to = choosen_website_url + user_language + "/" + url_addon;
			window.location = redirect_to;
			return;
		}
	}

	if (website_title == website_name + " EN-US" && check == false) {
		var website_language = "en-US";

		if (website_language == user_language) {
			return;
		}

		else {
			var choosen_website_url = root_website_link + "New World/SpaceLiving/";
			var redirect_to = choosen_website_url + user_language + "/" + url_addon;
			window.location = redirect_to;
			return;
		}
	}

	if (website_title == website_name + " PT-BR" && check == false) {
		var website_language = "pt-BR";

		if (website_language == user_language) {
			return;
		}

		else {
			var choosen_website_url = root_website_link + "New World/SpaceLiving/";
			var redirect_to = choosen_website_url + user_language + "/" + url_addon;
			window.location = redirect_to;
			return;
		}
	}

	if (website_title == website_name + " PT-PT" && check == false) {
		var website_language = "pt-PT";

		if (website_language == user_language) {
			return;
		}

		else {
			var choosen_website_url = root_website_link + "New World/SpaceLiving/";
			var redirect_to = choosen_website_url + user_language + "/" + url_addon;
			window.location = redirect_to;
			return;
		}
	}

	if (website_title == "The Story of the Bulkan Siblings Geral" && check == false) {
		var website_language = "General";

		if (website_language == user_language) {
			return;
		}

		else {
			if (user_language == english_language) {
				var choosen_website_url = root_website_link + "The Story of the Bulkan Siblings/";
				var redirect_to = choosen_website_url + user_language + "/" + url_addon;
				window.location = redirect_to;
				return;
			}

			if (user_language == portuguese_language) {
				var choosen_website_url = root_website_link + "A História dos Irmãos Bulkan/";
				var redirect_to = choosen_website_url + user_language + "/" + url_addon;
				window.location = redirect_to;
				return;
			}
		}
	}

	if (website_title == "The Story of the Bulkan Brothers" && check == false) {
		var website_language = "en-US";

		if (website_language == user_language) {
			return;
		}

		else {
			if (user_language == english_language) {
				var choosen_website_url = root_website_link + "The Story of the Bulkan Siblings/";
				var redirect_to = choosen_website_url + user_language + "/" + url_addon;
				window.location = redirect_to;
				return;
			}

			if (user_language == portuguese_language) {
				var choosen_website_url = root_website_link + "A História dos Irmãos Bulkan/";
				var redirect_to = choosen_website_url + user_language + "/" + url_addon;
				window.location = redirect_to;
				return;
			}
		}
	}

	if (website_title == "A História dos Irmãos Bulkan" && check == false) {
		var website_language = "pt-BR";

		if (website_language == user_language) {
			return;
		}

		else {
			if (user_language == english_language) {
				var choosen_website_url = root_website_link + "The Story of the Bulkan Siblings/";
				var redirect_to = choosen_website_url + user_language + "/" + url_addon;
				window.location = redirect_to;
				return;
			}

			if (user_language == portuguese_language) {
				var choosen_website_url = root_website_link + "A História dos Irmãos Bulkan/";
				var redirect_to = choosen_website_url + user_language + "/" + url_addon;
				window.location = redirect_to;
				return;
			}
		}
	}

	if (website_title == "A História dos Irmãos Bulkan PT-PT" && check == false) {
		var website_language = "pt-PT";

		if (website_language == user_language) {
			return;
		}

		else {
			if (user_language == english_language) {
				var choosen_website_url = root_website_link + "The Story of the Bulkan Siblings/";
				var redirect_to = choosen_website_url + user_language + "/" + url_addon;
				window.location = redirect_to;
				return;
			}

			if (user_language == portuguese_language) {
				var choosen_website_url = root_website_link + "A História dos Irmãos Bulkan/";
				var redirect_to = choosen_website_url + user_language + "/" + url_addon;
				window.location = redirect_to;
				return;
			}
		}
	}

	var website_name = "The Secret of the Crystals";
	var portuguese_website_name = "O Segredo dos Cristais";

	if (website_title == website_name + " General" && check == false) {
		var website_language = "General";

		if (website_language == user_language) {
			return;
		}

		else {
			if (user_language == english_language) {
				var choosen_website_url = root_website_link + website_name + "/";
				var redirect_to = choosen_website_url + user_language + "/" + url_addon;
				window.location = redirect_to;
				return;
			}

			if (user_language == portuguese_language) {
				var choosen_website_url = root_website_link + portuguese_website_name + "/";
				var redirect_to = choosen_website_url + user_language + "/" + url_addon;
				window.location = redirect_to;
				return;
			}
		}
	}

	if (website_title == website_name && check == false) {
		var website_language = "en-US";

		if (website_language == user_language) {
			return;
		}

		else {
			if (user_language == english_language) {
				var choosen_website_url = root_website_link + website_name + "/";
				var redirect_to = choosen_website_url + user_language + "/" + url_addon;
				window.location = redirect_to;
				return;
			}

			if (user_language == portuguese_language) {
				var choosen_website_url = root_website_link + portuguese_website_name + "/";
				var redirect_to = choosen_website_url + user_language + "/" + url_addon;
				window.location = redirect_to;
				return;
			}
		}
	}

	if (website_title == portuguese_website_name && check == false) {
		var website_language = "pt-BR";

		if (website_language == user_language) {
			return;
		}

		else {
			if (user_language == english_language) {
				var choosen_website_url = root_website_link + website_name + "/";
				var redirect_to = choosen_website_url + user_language + "/" + url_addon;
				window.location = redirect_to;
				return;
			}

			if (user_language == portuguese_language) {
				var choosen_website_url = root_website_link + portuguese_website_name + "/";
				var redirect_to = choosen_website_url + user_language + "/" + url_addon;
				window.location = redirect_to;
				return;
			}
		}
	}

	if (website_title == portuguese_website_name + " PT-PT" && check == false) {
		var website_language = "pt-PT";

		if (website_language == user_language) {
			return;
		}

		else {
			if (user_language == english_language) {
				var choosen_website_url = root_website_link + website_name + "/";
				var redirect_to = choosen_website_url + user_language + "/" + url_addon;
				window.location = redirect_to;
				return;
			}

			if (user_language == portuguese_language) {
				var choosen_website_url = root_website_link + portuguese_website_name + "/";
				var redirect_to = choosen_website_url + user_language + "/" + url_addon;
				window.location = redirect_to;
				return;
			}
		}
	}

	var website_name = "Desert Island";
	var portuguese_website_name = "Ilha Deserta";

	if (website_title == website_name && check == false) {
		var website_language = "General";

		if (website_language == user_language) {
			return;
		}

		else {
			if (user_language == english_language) {
				var choosen_website_url = root_website_link + website_name + "/";
				var redirect_to = choosen_website_url + user_language + "/" + url_addon;
				window.location = redirect_to;
				return;
			}

			if (user_language == portuguese_language) {
				var choosen_website_url = root_website_link + portuguese_website_name + "/";
				var redirect_to = choosen_website_url + user_language + "/" + url_addon;
				window.location = redirect_to;
				return;
			}
		}
	}

	if (website_title == website_name + " EN-US" && check == false) {
		var website_language = "en-US";
		var website_name = "Desert Island";

		if (website_language == user_language) {
			return;
		}

		else {
			if (user_language == english_language) {
				var choosen_website_url = root_website_link + website_name + "/";
				var redirect_to = choosen_website_url + user_language + "/" + url_addon;
				window.location = redirect_to;
				return;
			}

			if (user_language == portuguese_language) {
				var choosen_website_url = root_website_link + portuguese_website_name + "/";
				var redirect_to = choosen_website_url + user_language + "/" + url_addon;
				window.location = redirect_to;
				return;
			}
		}
	}

	if (website_title == portuguese_website_name && check == false) {
		var website_language = "pt-BR";

		if (website_language == user_language) {
			return;
		}

		else {
			if (user_language == english_language) {
				var choosen_website_url = root_website_link + website_name + "/";
				var redirect_to = choosen_website_url + user_language + "/" + url_addon;
				window.location = redirect_to;
				return;
			}

			if (user_language == portuguese_language) {
				var choosen_website_url = root_website_link + portuguese_website_name + "/";
				var redirect_to = choosen_website_url + user_language + "/" + url_addon;
				window.location = redirect_to;
				return;
			}
		}
	}

	if (website_title == portuguese_website_name + " PT-PT" && check == false) {
		var website_language = "pt-PT";

		if (website_language == user_language) {
			return;
		}

		else {
			if (user_language == english_language) {
				var choosen_website_url = root_website_link + website_name + "/";
				var redirect_to = choosen_website_url + user_language + "/" + url_addon;
				window.location = redirect_to;
				return;
			}

			if (user_language == portuguese_language) {
				var choosen_website_url = root_website_link + portuguese_website_name + "/";
				var redirect_to = choosen_website_url + user_language + "/" + url_addon;
				window.location = redirect_to;
				return;
			}
		}
	}

	var website_name = "Stake2";
	var second_website_name = "Stake2, Funkysnipa Cat";

	if (website_title == second_website_name && check == false) {
		var website_language = "General";

		if (user_language == website_language) {
			return;
		}

		if (user_language != website_language) {
			var choosen_website_url = root_website_link + website_name + "/";
			var res = choosen_website_url + user_language + "/";
			window.location = res;
		}
	}

	if (website_title == second_website_name + " EN-US" && check == false) {
		website_language = "en-US";

		if (user_language == website_language) {
			return;
		}

		if (user_language != website_language) {
			var choosen_website_url = root_website_link + website_name + "/";
			var res = choosen_website_url + user_language + "/";
			window.location = res;
		}
	}

	if (website_title == second_website_name + " PT-BR" && check == false) {
		website_language = "pt-BR";

		if (user_language == website_language) {
			return;
		}

		if (user_language != website_language) {
			var choosen_website_url = root_website_link + website_name + "/";
			var res = choosen_website_url + user_language + "/";
			window.location = res;
		}
	}

	if (website_title == second_website_name + " PT-PT" && check == false) {
		website_language = "pt-PT";

		if (user_language == website_language) {
			return;
		}

		if (user_language != website_language) {
			var choosen_website_url = root_website_link + website_name + "/";
			var res = choosen_website_url + user_language + "/";
			window.location = res;
			var thiss = that;
		}
	}

	var current_variable_year = 2018;
	var current_year = new Date().getFullYear();

	var year_websites = [];

	while (current_variable_year <= Number(current_year)) {
		year_websites.push(String(current_variable_year));

		current_variable_year += 1;
	}

	var current_variable_year = 2018;
	var current_year = new Date().getFullYear();

	year_websites.forEach(Check_Website_Link_By_Language);
}

function Check_Website_Link_By_Language(item) {
	var title = document.getElementsByTagName("title")[0];
	var website_title = title.innerHTML;
	var current_site_link = window.location;

	var website_name = item;
	var backup_website_name = "Years/" + website_name;
	var additional_values = ["My", "Meu"];
	var check = String(current_site_link).includes("no-redirect=true");

	additional_value = additional_values[0] + " ";

	website_name = additional_value + website_name;

	if (website_title == website_name && check == false) {
		var website_language = "General";

		if (user_language == website_language) {
			return;
		}

		if (user_language != website_language) {
			var choosen_website_url = root_website_link + backup_website_name + "/";
			var res = choosen_website_url + user_language.toLowerCase() + "/";
			window.location = res;
		}
	}

	if (website_title == website_name + " EN-US" && check == false) {
		website_language = "en-US";

		if (user_language == website_language) {
			return;
		}

		if (user_language != website_language) {
			var choosen_website_url = root_website_link + backup_website_name + "/";
			var res = choosen_website_url + user_language.toLowerCase() + "/";
			window.location = res;
		}
	}

	additional_value = additional_values[1] + " ";

	website_name = additional_value + website_name;

	if (website_title == website_name + " PT-BR" && check == false) {
		website_language = "pt-BR";

		if (user_language == website_language) {
			return;
		}

		if (user_language != website_language) {
			var choosen_website_url = root_website_link + backup_website_name + "/";
			var res = choosen_website_url + user_language.toLowerCase() + "/";
			window.location = res;
		}
	}

	if (website_title == website_name + " PT-PT" && check == false) {
		website_language = "pt-PT";

		if (user_language == website_language) {
			return;
		}

		if (user_language != website_language) {
			var choosen_website_url = root_website_link + backup_website_name + "/";
			var res = choosen_website_url + user_language.toLowerCase() + "/";
			window.location = res;
		}
	}
}

console.log("Redirect Script was loaded and checked the redirect status.");