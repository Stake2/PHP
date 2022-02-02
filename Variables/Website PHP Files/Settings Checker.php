<?php 

$website_settings = array(
"use_custom_buttons_bar" => False,
"use_custom_tab_titles" => False,
"has_two_website_titles" => False,
"has_stories_tab" => False,
"variable_inserter" => False,
"variable_inserter_double" => True,
"use_text_as_replacer" => False,
"custom_layout" => False,
"custom_website_image_border" => False,
"notifications" => False,
"tab_body_generator" => False,
"no_border_in_website_image" => False,
"hide_sensitive_data" => False,
);

foreach (array_keys($website_settings) as $key) {
	$value = $website_settings[$key];

	if (text_contains($key."=true", $host_text) == True or text_contains($key."=True", $host_text) == True) {
		$website_settings[$key] = True;
	}

	if (text_contains($key."=false", $host_text) == True or text_contains($key."=False", $host_text) == True) {
		$website_settings[$key] = False;
	}
}

$story_website_settings = array(
"show_new_chapter_text" => True,
"has_story_covers" => True,
"has_custom_story_folder" => False,
"replace_story_text" => False,
"chapter_opener" => True,
"has_titles" => True,
"has_reads" => False,
"has_comments" => False,
"chapter_comments" => True,
"has_dates" => False,
"use_status" => False,
);

foreach (array_keys($story_website_settings) as $key) {
	$value = $story_website_settings[$key];

	if (text_contains($key."=true", $host_text) == True or text_contains($key."=True", $host_text) == True) {
		$story_website_settings[$key] = True;
	}

	if (text_contains($key."=false", $host_text) == True or text_contains($key."=False", $host_text) == True) {
		$story_website_settings[$key] = False;
	}
}

$website_function_settings = array(
"all" => False,
"website_buttons" => True,
"tabs" => True,
"hide_tabs" => True,
"header" => True,
"image_link_button" => True,
"websites_tab" => True,
"is_prototype" => False,
"javascript" => True,
);

if (text_contains("all=true", $host_text) == True or text_contains("all=True", $host_text) == True) {
	foreach (array_keys($story_website_settings) as $setting) {
		if ($setting != "all") {
			$website_function_settings[$setting] = False;
		}
	}
}

?>