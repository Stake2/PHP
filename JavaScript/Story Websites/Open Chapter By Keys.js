document.addEventListener("keyup", function() {
	var left_arrow = 37;
	var right_arrow = 39;
	var is_ctrl;
	var is_shift;
	var is_alt;
	var supported_keys_array;
	var modifier_key_is_pressed;
	var opening_chapter_text;
	var userLang = navigator.language || navigator.userLanguage;

	if (userLang == "pt-BR" || userLang == "pt-PT") {
		var chapter_div_text = "capítulo-";
	}

	else {
		var chapter_div_text = "chapter-";
	}

	var active_element = document.activeElement;
	var chapter_title_text_area = document.getElementById("edit_chapter_title_text_textarea_number_" + Chapter_Number);
	var chapter_story_text_area = document.getElementById("edit_chapter_story_text_textarea_number_" + Chapter_Number);

	if (event.keyCode === left_arrow || event.keyCode === right_arrow) {
		event.preventDefault();
		is_ctrl = !!event.ctrlKey;
		is_shift = !!event.shiftKey;
		is_alt = !!event.altKey;

		supported_keys_array = [is_ctrl, is_shift]

		var i = 0;
		while (i <= supported_keys_array.length) {
			modifier_key = supported_keys_array[i];

			if (modifier_key == true) {
				modifier_key_is_pressed = true;
			}

			i++;
		}

		if (modifier_key_is_pressed == true && active_element != chapter_title_text_area && active_element != chapter_story_text_area) {
			if (event.keyCode === left_arrow) {
				if (Chapter_Number != 1) {
					opening_chapter_text = "Opening chapter number " + (Chapter_Number - 1) + ".";

					console.log(opening_chapter_text);
					openCity(chapter_div_text + (Chapter_Number - 1));
					Define_Chapter((Chapter_Number - 1));
				}
			}

			if (event.keyCode === right_arrow) {
				if (Chapter_Number != Last_Chapter) {
					opening_chapter_text = "Opening chapter number " + (Chapter_Number + 1) + ".";

					console.log(opening_chapter_text);
					openCity(chapter_div_text + (Chapter_Number + 1));
					Define_Chapter((Chapter_Number + 1));
				}
			}
		}
	}
});

console.log("Open Chapter By Keys Script was loaded.");