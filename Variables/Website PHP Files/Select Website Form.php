<?php 

function Make_Form($mode = "") {
	global $php_settings;
	global $full_tab_style;
	global $first_button_style;
	global $first_full_border;
	global $website_titles;
	global $website_portuguese_titles;
	global $website_info;
	global $beautiful_languages;
	global $beautiful_languages_portuguese;
	global $languages_by_word;
	global $_POST;
	global $_SESSION;
	global $website_setting_names;
	global $portuguese_website_setting_names;
	global $story_website_setting_names;
	global $portuguese_story_website_setting_names;

	if (text_contains("HTML Generator", basename(__FILE__, ".php")) == False) {
		$form = '<form name="select_website" action="/'.$mode.'" method="post" class="'.$full_tab_style.' w3-container" style="border-radius: 50px;padding:20px;">

	<h3 class="w3-center"><b>'.Language_Item_Definer("Website", "Site").':</b></h3>
	<select name="website" id="Websites" value="{}" class="w3-input w3-center '.$first_button_style.'" style="border-radius: 50px;">
{}
	</select>
	<br />

	<h3 class="w3-center"><b>'.Language_Item_Definer("Language", "Idioma").':</b></h3>
	<select name="language" id="Languages" value="{}" class="w3-input w3-center '.$first_button_style.'" style="border-radius: 50px;">
{}
	</select>
	<br />

	<h3 class="w3-center"><b>'.Language_Item_Definer("Website setting", "Configuração de site").':</b></h3>
	<select name="website_setting" id="Website_Setting" value="{}" class="w3-input w3-center '.$first_button_style.'" style="border-radius: 50px;">
{}
	</select>
	<br />

	<h3 class="w3-center"><b>'.Language_Item_Definer("Story website setting", "Configuração de site de história").':</b></h3>
	<select name="story_website_setting" id="Story_Website_Setting" value="{}" class="w3-input w3-center '.$first_button_style.'" style="border-radius: 50px;">
{}
	</select>
	<br />
	';

		if ($mode == "Select") {
			$form .= '<label>
		<div class="'.$first_button_style.'" style="border-radius:30%;margin-left:45%;margin-right:45%;">
			<h4><b>'.Language_Item_Definer("Code", "Programar").'</b></h4>
			<input type="radio" id="Code" name="mode" value="Code" class="w3-input" checked="True" style="margin-bottom:10px;transform: scale(2);">
		</div>
	</label>

	<label>
		<div class="'.$first_button_style.'" style="border-radius:30%;margin-left:45%;margin-right:45%;">
			<h4><b>'.Language_Item_Definer("Generate", "Gerar").'</b></h4>
			<input type="radio" id="Generate" name="mode" value="Generate" class="w3-input" style="margin-bottom:20px;transform: scale(2);">
		</div>
	</label>
	<br />';
		}

		$form .= '
	<center><button type="submit" class="'.$first_button_style.'">'.Language_Item_Definer("Submit", "Enviar").'</button></center>
	<br />
</form>';

		$websites = "";

		foreach (array_values(Language_Item_Definer($website_titles, $website_portuguese_titles)) as $local_website) {
			$string = "\t\t".format('<option value="{}">{}</option>', array($local_website, $local_website));

			if ($local_website == $website_info["english_title"]) {
				$string = str_replace("\">", '" selected="True">', $string);
			}

			$websites .= $string;

			if ($local_website != array_reverse(array_values(Language_Item_Definer($website_titles, $website_portuguese_titles)))[0]) {
				$websites .= "\n";
			}
		}

		$languages = "";

		foreach (Language_Item_Definer($beautiful_languages, $beautiful_languages_portuguese) as $local_language) {
			$string = "\t\t".format('<option value="{}">{}</option>', array($local_language, $local_language));

			if ($languages_by_word[$local_language] == $website_info["language"]) {
				$string = str_replace('">', '" selected="True">', $string);
			}

			$languages .= $string;

			if ($local_language != array_reverse(Language_Item_Definer($beautiful_languages, $beautiful_languages_portuguese))[0]) {
				$languages .= "\n";
			}
		}

		$local_website_settings = "";

		foreach ($website_setting_names as $setting_key) {
			$setting_name = Language_Item_Definer($setting_key, $portuguese_website_setting_names[$setting_key]);
			$setting_name = ucfirst(str_replace("_", " ", strtolower($setting_name)));

			$string = "\t\t".format('<option value="{}">{}</option>', array($setting_key, $setting_name));

			$local_website_settings .= $string;

			if ($setting_key != array_reverse(array_keys($website_setting_names))[0]) {
				$local_website_settings .= "\n";
			}
		}

		$local_story_website_settings = "";

		foreach ($story_website_setting_names as $setting_key) {
			$setting_name = Language_Item_Definer($setting_key, $portuguese_story_website_setting_names[$setting_key]);
			$setting_name = ucfirst(str_replace("_", " ", strtolower($setting_name)));

			$string = "\t\t".format('<option value="{}">{}</option>', array($setting_key, $setting_name));

			$local_story_website_settings .= $string;

			if ($setting_key != array_reverse(array_keys($story_website_setting_names))[0]) {
				$local_story_website_settings .= "\n";
			}
		}

		if (isset($_SESSION["POST"]) == True) {
			$form = format(
			$form, array($_SESSION["POST"]["website"], $websites,
			$_SESSION["POST"]["language"], $languages,
			$_SESSION["POST"]["website_setting"], $local_website_settings,
			$_SESSION["POST"]["story_website_setting"], $local_story_website_settings
			));

			$form = str_replace(
			format('<option value="{}">{}</option>', array($_SESSION["POST"]["website"], $_SESSION["POST"]["website"])),
			format('<option value="{}" selected="True">{}</option>', array($_SESSION["POST"]["website"], $_SESSION["POST"]["website"])),
			$form
			);

			$setting_name = Language_Item_Definer($_SESSION["POST"]["website_setting"], $portuguese_website_setting_names[$_SESSION["POST"]["website_setting"]]);
			$setting_name = ucfirst(str_replace("_", " ", strtolower($setting_name)));

			$form = str_replace(
			format('<option value="{}">{}</option>', array($_SESSION["POST"]["website_setting"], $setting_name)),
			format('<option value="{}" selected="True">{}</option>', array($_SESSION["POST"]["website_setting"], $setting_name)),
			$form
			);

			$setting_name = Language_Item_Definer($_SESSION["POST"]["story_website_setting"], $portuguese_story_website_setting_names[$_SESSION["POST"]["story_website_setting"]]);
			$setting_name = ucfirst(str_replace("_", " ", strtolower($setting_name)));

			$form = str_replace(
			format('<option value="{}">{}</option>', array($_SESSION["POST"]["story_website_setting"], $setting_name)),
			format('<option value="{}" selected="True">{}</option>', array($_SESSION["POST"]["story_website_setting"], $setting_name)),
			$form
			);
		}

		else if (isset($_POST) == True) {
			$form = format($form, array(
			$php_settings["method"]["website"], $websites,
			$php_settings["method"]["language"], $languages,
			$php_settings["method"]["website_setting"], $local_website_settings,
			$php_settings["method"]["story_website_setting"], $local_story_website_settings
			));
		}

		return $form;
	}
}

?>