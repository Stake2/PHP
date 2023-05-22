var user_language = navigator.language || navigator.userLanguage;
var hide_button_text, hide_button_div;

// Defines the button text if the user language is English
if (user_language == "en-US") {
	hide_button_text = "Hide Chapter Covers Div";
	hiding_images_text = "Hiding chapter covers";
}

// Defines the button text if the user language is Brazilian Portuguese or European Portuguese
if (user_language == "pt-BR" || user_language == "pt-PT") {
	hide_button_text = "Esconder Capas de Capítulos Div";
	hiding_images_text = "Escondendo capas de capítulos";
}

else {
	hide_button_text = "Hide Chapter Covers Div";
	hiding_images_text = "Hiding chapter covers";
}

function Hide_Chapter_Images() {
	i = 1;

	console.log(hiding_images_text + "...");

	while (i <= Last_Chapter + 1) {
		chapter_image = document.getElementById("story_chapter_image_number_" + i);

		if (chapter_image != null) {
			chapter_image.parentNode.removeChild(chapter_image);
		}

		i++;
	}

	hide_button_div = document.getElementById(hide_button_text);
	hide_button_div.style.display = "none";
}