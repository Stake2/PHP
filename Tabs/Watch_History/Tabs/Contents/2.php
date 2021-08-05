<?php 

$i = 0;
$z = 0;

foreach ($mixed_media_type_names_plural_dict as $media_type) {
	if ($media_type != Null) {
		$language_media_type = $language_plural_media_types[$i];
		$watched_medias = Read_String($watching_media_files[$media_type]);
		$watched_media_episodes = "";

		if ($media_type == $mixed_media_type_video_plural) {
			$language_media_type = Language_Item_Definer("YouTube Channels", "Canais do YouTube");
		}

		echo Create_Element("div", "w3-animate-zoom", Create_Element("b", "", $language_media_type.":", "style=\"color: var(--green-color)!important;\""))."\n";
		echo Create_Element("div", "w3-animate-zoom", $watched_medias, "style=\"color: var(--green-color)!important;\"")."\n";
	
		echo "<br />";
	}

	$i++;
}

?>