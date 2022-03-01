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

		if (isset($_SESSION["POST"]) == True) {
			$form = format($form, array($_SESSION["POST"]["website"], $websites, $_SESSION["POST"]["language"], $languages));

			$form = str_replace(
			format('<option value="{}">{}</option>', array($_SESSION["POST"]["website"], $_SESSION["POST"]["website"])),
			format('<option value="{}" selected="True">{}</option>', array($_SESSION["POST"]["website"], $_SESSION["POST"]["website"])),
			$form
			);
		}

		else if (isset($_POST) == True) {
			$form = format($form, array($php_settings["method"]["website"], $websites, $php_settings["method"]["language"], $languages));
		}

		return $form;
	}
}

?>