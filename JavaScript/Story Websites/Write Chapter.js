var Chapter_Number;
var Last_Chapter = 29;
var readattribute;
var writeattribute;
var userLang = navigator.language || navigator.userLanguage;

function Define_Chapter(number) {
    Chapter_Number = number;
	readattribute = $("#show_story_chapter_text_button_number_" + Chapter_Number).html();
	writeattribute = $("#edit_story_chapter_button_number_" + Chapter_Number).html();
}

if (userLang == "pt-BR" || userLang == "pt-PT") {
	var chapter_text = "capítulo";
	var read_chapter_text = "ler-capitulo-";
	var chapter_text_name = "texto-capítulo-";
	var write_chapter_button_text = "botão-de-escrever-";
}
	
else {
	var chapter_text = "chapter";
	var read_chapter_text = "read-chapter-";
	var chapter_text_name = "chapter-text-";
	var write_chapter_button_text = "write-button-";
}
	
function Write_Chapter(Chapter_Write_Content) {
    $("#" + chapter_text_name + Chapter_Number).html(Chapter_Write_Content);
    $("#" + write_chapter_button_text + Chapter_Number).html('<h3><i class="fas fa-book"></i></h3>');
    $("#" + write_chapter_button_text + Chapter_Number).attr('onclick', 'Replace_Chapter_Write_Content_With_Read_Content(' + readattribute + ');');
}

function Replace_Chapter_Write_Content_With_Read_Content(Chapter_Read_Content) {
    openCity(chapter_text + '-' + Chapter_Number);
    $("#" + chapter_text_name + Chapter_Number).html(Chapter_Read_Content);
    $("#" + write_chapter_button_text + Chapter_Number).html('<h3><i class="fas fa-pen"></i></h3>');
    $("#" + write_chapter_button_text + Chapter_Number).attr('onclick', 'Write_Chapter(' + writeattribute + ');');
}

console.log("Write Chapter Script was loaded.");