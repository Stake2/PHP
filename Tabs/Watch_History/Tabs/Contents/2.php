<?php 

$i = 0;
$z = 0;

foreach ($mixed_media_type_names_plural_dict as $media_type) {
	if ($media_type != Null) {
		$language_media_type = $language_plural_media_types[$i];

		echo Create_Element("span", $text_green_css_class, Create_Element("b", "", $language_media_type.":"))."\n"."<br />";
		Show_Text($watching_media_files[$media_type]);
		echo "<br />";
	}

	$i++;
}

?>