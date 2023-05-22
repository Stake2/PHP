<?php 

$watching_medias_text = "";

$i = 0;
foreach ($mixed_media_type_names_plural_dict as $media_type) {
	if ($media_type != Null) {
		$language_media_type = $language_plural_media_types[$i];
		$mixed_media_type = $mixed_media_type_names_plural[$i];

		$media_info_folder_media_type_folder = $media_info_folders[$media_type];

		$watcing_medias = Read_Lines($watching_media_files[$media_type]);
		$watcing_medias = array_merge($watcing_medias, Read_Lines($re_watching_media_files[$media_type]));

		$watched_media_episodes = "";

		$c = 0;
		if (count($watcing_medias) != 0) {
			while ($c <= count($watcing_medias) - 1) {
				$watched_media = Remove_Non_File_Characters($watcing_medias[$c]);

				$media_details_file = $media_info_folder_media_type_folder.$watched_media."/Media Details.txt";
				$media_details = Make_Setting_Dictionary(Read_Lines($media_details_file));

				if (isset($media_details["Current Episode"]) == True) {
					$current_episode = $media_details["Current Episode"];

					if (strpos($current_episode, ", Remote") == True) {
						$current_episode = str_replace(", Remote", "", $current_episode);
					}

					if (strpos($current_episode, ", Local") == True) {
						$current_episode = str_replace(", Local", "", $current_episode);
					}

					$watcing_medias[$c] .= " (".Language_Item_Definer("Episode", "Episódio").": ".$current_episode.")";
				}

				if (isset($media_details["Current Series"]) == True) {
					$current_series = $media_details["Current Series"];

					$watcing_medias[$c] .= " (".Language_Item_Definer("Series", "Série").": ".$current_series.")";
				}

				$watcing_medias[$c] = Create_ELement("span", $text_blue_css_class." ".$text_hover_white_css_class, ($c + 1))." - ".Create_Element("span", $text_hover_white_css_class, $watcing_medias[$c]);

				$c++;
			}

			$watcing_medias = Stringfy_Array($watcing_medias, $add_br = True);

			if ($media_type == $mixed_media_type_video_plural) {
				$language_media_type = Language_Item_Definer("YouTube Channels", "Canais do YouTube");
			}

			$watching_medias_text .= Create_Element("div", "w3-animate-zoom", Create_Element("b", "", $language_media_type.":", "style=\"color: var(--green-color)!important;\""))."\n";
			$watching_medias_text .=  Create_Element("div", "w3-animate-zoom", $watcing_medias, "style=\"color: var(--green-color)!important;\"")."\n";
		
			$watching_medias_text .=  "<br />";
		}
	}

	$i++;
}

echo Create_Element("h3", $first_text_color." ".$computer_variable, $watching_medias_text);
echo Create_Element("h4", $first_text_color." ".$mobile_variable, $watching_medias_text);

?>