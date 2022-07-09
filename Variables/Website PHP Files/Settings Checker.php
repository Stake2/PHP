<?php 

$website_setting_names = array(
"nothing",
"use_custom_buttons_bar",
"use_custom_tab_titles",
"has_two_website_titles",
"has_stories_tab",
"variable_inserter",
"variable_inserter_double",
"use_text_as_replacer",
"custom_layout",
"custom_website_image_border",
"notifications",
"tab_body_generator",
"no_border_in_website_image",
"hide_sensitive_data",
);

$portuguese = array(
"nada",
"usar_barra_de_botões_personalizada",
"usar_títulos_de_aba_personalizados",
"tem_dois_títulos_de_site",
"tem_aba_de_histórias",
"insersor_de_variáveis",
"insersor_de_variáveis_duplo",
"usar_texto_como_substituto",
"layout_personaliazdo",
"barra_de_imagem_de_site_personalizada",
"notificações",
"gerador_de_corpo_de_abas",
"sem_borda_na_imagem_do_site",
"esconder_dados_sensíveis",
);

$values = array(
False,
False,
False,
False,
False,
False,
True,
False,
False,
False,
False,
False,
False,
False,
);

$i = 0;
foreach ($website_setting_names as $setting_name) {
	$portuguese_website_setting_names[$setting_name] = $portuguese[$i];
	$website_settings[$setting_name] = $values[$i];

	$i++;
}

$story_website_setting_names = array(
"nothing",
"show_new_chapter_text",
"has_story_covers",
"show_story_covers_on_chapter_buttons_tab",
"has_custom_story_folder",
"replace_story_text",
"chapter_opener",
"has_titles",
"has_reads",
"has_comments",
"chapter_comments",
"show_chapter_on_comment",
"has_dates",
"use_status",
);

$portuguese = array(
"nada",
"mostrar_texto_de_novo_capítulo",
"tem_capas_de_história",
"mostra_capas_de_história_na_aba_de_botões_de_capítulo",
"tem_pasta_de_história_personalizada",
"substituir_texto_de_história",
"abridor_de_capítulos",
"tem_títulos",
"tem_leituras",
"tem_comentários",
"comentários_de_capítulo",
"mostrar_capítulo_no_comentário",
"tem_datas",
"usa_status",
);

$values = array(
False,
True,
True,
False,
False,
False,
True,
True,
False,
False,
True,
False,
False,
False,
);

$i = 0;
foreach ($story_website_setting_names as $setting_name) {
	$value = $values[$i];

	$portuguese_story_website_setting_names[$setting_name] = $portuguese[$i];
	$story_website_settings[$setting_name] = $value;

	$i++;
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
"select_website_form" => True,
);

function Check_Website_Setting() {
	global $http_method;
	global $website_setting_names;
	global $website_settings;
	global $story_website_setting_names;
	global $story_website_settings;

	foreach ($website_setting_names as $setting_name) {
		$setting_value = $website_settings[$setting_name];

		if (isset($http_method["website_setting"]) == True and $http_method["website_setting"] == $setting_name) {
			if ($setting_value == True) {
				$website_settings[$setting_name] = False;
			}

			if ($setting_value == False) {
				$website_settings[$setting_name] = True;
			}
		}
	}

	foreach ($story_website_setting_names as $setting_name) {
		$setting_value = $story_website_settings[$setting_name];

		if (isset($http_method["story_website_setting"]) == True and $http_method["story_website_setting"] == $setting_name) {
			if ($setting_value == True) {
				$story_website_settings[$setting_name] = False;
			}

			if ($setting_value == False) {
				$story_website_settings[$setting_name] = True;
			}
		}
	}
}

?>