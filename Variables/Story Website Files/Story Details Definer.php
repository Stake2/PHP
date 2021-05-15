<?php 

$story_synopsis = Language_Item_Definer($story_synopsis[0], $story_synopsis[1]);

$website_meta_description = format(Language_Item_Definer("Website about my story, {}, made by stake2.", "Site sobre a minha história, {}, feito por stake2."), $story_name_variable);

$website_header_description = format(Language_Item_Definer("Synopsis", "Sinopse").': <i class="fas fa-scroll"></i> "{}'.'"<br />', $story_synopsis);

# Website name in English and Brazilian Portuguese language
$websites_names_array = array(
$title_enus = $story_name_variable,
$title_ptbr = $story_name_variable,
);

?>