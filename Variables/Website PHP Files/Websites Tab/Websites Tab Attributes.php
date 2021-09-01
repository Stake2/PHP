<?php 

$siteicons = array(
'📘',
'🦄',
'👁',
'📅',
'⊡',
'🎵',
'🎮',
'🗒',
);

$sitecodes = array(
'my_little_pony'.' '.$siteicons[1],
'watch'.' '.$siteicons[2],
'music'.' '.$siteicons[5],
'games'.' '.$siteicons[6],
'foobar_albums'.' '.$siteicons[5],
'terraria_talk'.' '.$siteicons[6],
'tasks'.' '.$siteicons[7],
'years'.' '.$siteicons[3],
);

array_push($sitecodes, '2018');
array_push($sitecodes, '2019');
array_push($sitecodes, '2020');
array_push($sitecodes, '2021');
array_push($sitecodes, 'stories_historias'.' '.$siteicons[0]);
array_push($sitecodes, 'new_world'.' '.$siteicons[4]);
array_push($sitecodes, "The Life of Littletato");
array_push($sitecodes, "New_World/SpaceLiving");
array_push($sitecodes, 'The Story of the Bulkan Siblings');
array_push($sitecodes, 'Desert Island');
array_push($sitecodes, 'mental_frameworks');
array_push($sitecodes, 'template');
array_push($sitecodes, 'stake2');
array_push($sitecodes, 'website_status');

if (in_array($website_language, $en_languages_array)) {
	$things_i_do_link = $main_website_url.$sitecodes[7].'/';
	$sitecodes[16] = "The Story of the Bulkan Siblings";
}

if (in_array($website_language, $pt_languages_array)) {
	$things_i_do_link = $main_website_url.'coisas_que_eu_faço'.'/';
	$sitecodes[16] = "A História dos Irmãos Bulkan";
}

$sitelinks = array(
'https://printsofcomputer.netlify.app', #POCB Link
$main_website_url."Diary/",
$main_website_url.$sitecodes[0].'/',
$website_watch_history_link = $main_website_url.$sitecodes[1].'/',
$main_website_url.$sitecodes[2].'/',
$main_website_url.$sitecodes[3].'/',
$main_website_url.$sitecodes[4].'/',
$main_website_url.$sitecodes[5].'/',
$main_website_url.$sitecodes[6].'/',
$things_i_do_link, #Things I Do
$main_website_url.$sitecodes[7].'/',
$main_website_url.$sitecodes[8].'/',
$main_website_url.$sitecodes[9].'/',
$main_website_url.$sitecodes[10].'/',
$main_website_url.$sitecodes[11].'/',
$main_website_url.$sitecodes[12].'/',
$main_website_url.$sitecodes[13].'/',
$website_the_life_of_littletato_link = $main_website_url.$sitecodes[14].'/',
$website_spaceliving_link = $main_website_url.$sitecodes[15].'/',
$website_the_story_of_the_bulkan_siblings_link = $main_website_url.$sitecodes[16].'/',
$website_desert_island_link = $main_website_url.$sitecodes[17].'/',
$main_website_url.$sitecodes[18].'/',
$main_website_url.$sitecodes[19].'/',
$main_website_url.$sitecodes[20].'/',
$main_website_url.$sitecodes[21].'/',
$website_website_status_link = $main_website_url.$sitecodes[21].'/',
);

$spaceliving_link_name = Language_Item_Definer("SpaceLiving SpaceShip Network", "Rede SpaceLiving");
$spaceliving_link_name_alternate = "SpaceLiving";
$the_life_of_littletato_link_name = Language_Item_Definer("The Life of Littletato", "A Vida de Pequenata");

$website_spaceliving_link_a = '<a href="'.$website_spaceliving_link.'" target="_blank" class="w3-text-white">{}</a>';
$website_spaceliving_linked = format($website_spaceliving_link_a, $spaceliving_link_name);
$website_spaceliving_linked_alternate = format($website_spaceliving_link_a, $spaceliving_link_name_alternate);

$website_the_life_of_littletato_linked = '<a href="'.$website_the_life_of_littletato_link.'" target="_blank" class="w3-text-white">{}</a>';
$website_the_life_of_littletato_linked = format($website_the_life_of_littletato_linked, $the_life_of_littletato_link_name);

$the_story_of_the_bulkan_siblings_link_name = Language_Item_Definer("The Story of the Bulkan Siblings", "A História dos Irmãos Bulkan");
$website_the_story_of_the_bulkan_siblings_linked = Make_Link($website_the_story_of_the_bulkan_siblings_link, $the_story_of_the_bulkan_siblings_link_name, $text_white_css_class);

$story_namenames2 = array(
$sitename_pequenata = $the_life_of_littletato_story_name.' '.$siteicons[0],
$sitename_spaceliving = $spaceliving_story_name.' '.$siteicons[0],
$sitename_bulkan = $the_story_of_the_bulkan_siblings_story_name.' '.$siteicons[0],
$sitename_desertisland = $desert_island_story_name,
);

if (in_array($website_language, $en_languages_array)) {
	$language_website_names_array = array(
	$sitename_diario = 'Diary'.' '.$siteicons[0],
	$sitename_music = 'Music'.' '.$siteicons[5],
	$sitename_games = 'Games'.' '.$siteicons[6],
	$sitename_foobar_albums = 'Foobar_Albums'.' '.$siteicons[5],
	$sitename_tasks = 'Tasks'.' '.$siteicons[7],
	$sitename_thingsido = 'Things I Do'.' '.$siteicons[7],
	$sitename_years = 'Years'.' '.$siteicons[3],
	$sitename_stories = 'Stories'.' '.$siteicons[0],
	$sitename_mental_frameworks = 'Mental_Frameworks',
	$sitename_website_template = 'Website Template',
	$sitename_website_status = 'Website Status',
	);
}

if (in_array($website_language, $pt_languages_array)) {
	$language_website_names_array = array(
	$sitename_diario = 'Diário'.' '.$siteicons[0],
	$sitename_music = 'Música'.' '.$siteicons[5],
	$sitename_games = 'Jogos'.' '.$siteicons[6],
	$sitename_foobar_albums = 'Albuns do Foobar (Foobar_Albums)'.' '.$siteicons[5],
	$sitename_tasks = 'Tarefas'.' '.$siteicons[7],
	$sitename_thingsido = 'Coisas Que Eu Faço'.' '.$siteicons[7],
	$sitename_years = 'Anos'.' '.$siteicons[3],
	$sitename_stories = 'Histórias'.' '.$siteicons[0],
	$sitename_mental_frameworks = 'Frameworks Mentais',
	$sitename_website_template = 'Modelo de Website',
	$sitename_website_status = 'Status dos Sites',
	);
}

$websites_names_array = array(
'Prints Of Computer Blocks',
$sitename_diario,
'My Little Pony'.' '.$siteicons[1],
'Watch History'.' '.$siteicons[2],
$sitename_music,
$sitename_games,
$sitename_foobar_albums,
'Terraria_Talk'.' '.$siteicons[6],
$sitename_tasks,
$sitename_thingsido,
$sitename_years,
'2018 '.$siteicons[3],
'2019 '.$siteicons[3],
'2020 '.$siteicons[3],
'2021 '.$siteicons[3],
$sitename_stories,
'New World'.' '.$siteicons[4],
$sitename_pequenata,
$sitename_spaceliving,
$sitename_bulkan,
$sitename_desertisland,
$sitename_mental_frameworks,
$sitename_website_template,
'Stake2',
$sitename_website_status,
);

$websites_names_array_2 = array(
'Prints Of Computer Blocks',
str_replace(' '.$siteicons[0], "", $sitename_diario),
'My Little Pony',
'Watch History',
str_replace(' '.$siteicons[5], "", $sitename_music),
str_replace(' '.$siteicons[6], "", $sitename_games),
str_replace(' '.$siteicons[5], "", $sitename_foobar_albums),
'Terraria_Talk',
str_replace(' '.$siteicons[7], "", $sitename_tasks),
str_replace(' '.$siteicons[7], "", $sitename_thingsido),
str_replace(' '.$siteicons[3], "", $sitename_years),
'2018',
'2019',
'2020',
str_replace(' '.$siteicons[0], "", $sitename_stories),
'New World',
str_replace(' '.$siteicons[0], "", $sitename_pequenata),
str_replace(' '.$siteicons[0], "", $sitename_spaceliving),
str_replace(' '.$siteicons[0], "", $sitename_bulkan),
$sitename_desertisland,
$sitename_mental_frameworks,
$sitename_website_template,
'Stake2',
);

$yearnames = array_keys($year_code_numbes_array);

$story_namelinks = array(
$website_the_life_of_littletato_link,
$website_spaceliving_link,
$website_the_story_of_the_bulkan_siblings_link,
$website_desert_island_link,
);

#$websites_number = count($website_names_array) - 1; #22

$websites_number = 24;
$story_name_websites_number = $stories_number - 1;
$websites_number_text = count($sitelinks);

$websites_buttons_style = $first_button_style;

#Normal Sites Buttons generator
$i = 0;
$websites_number = $websites_number;
while ($i <= $websites_number) {
	$websites_buttons_array[$i] = '<button class="w3-btn '.$websites_buttons_style.' '.$computer_variable.'" title="'.$websites_names_array[$i].'" '.$roundedborderstyle.' onclick='.'"window.open('."'".$sitelinks[$i]."');".'"'."><".$h2_element.">".$websites_names_array[$i]."</".$h2_element."></button>";

	$i++;
}

$i = 0;
$websites_number = $websites_number;
while ($i <= $websites_number) {
	$websites_buttons_mobile[$i] = '<button class="w3-btn '.$websites_buttons_style.' '.$mobile_variable.'" title="'.$websites_names_array[$i].'" '.$roundedborderstyle.' onclick='.'"window.open('."'".$sitelinks[$i]."');".'"'."><".$h4_element.">".$websites_names_array[$i]."</".$h4_element."></button>";

	$i++;
}


#Blue Sites Buttons generator
$i = 0;
$websites_number = $websites_number;
while ($i <= $websites_number) {
	$websites_buttons_blue[$i] = '<button class="w3-btn w3-blue '.$websites_buttons_style.' '.$computer_variable.'" title="'.$websites_names_array[$i].'" '.$roundedborderstyle.' onclick='.'"window.open('."'".$sitelinks[$i]."');".'"'."><".$h2_element.">".$websites_names_array[$i]."</".$h2_element."></button>";

	$i++;
}

$i = 0;
$websites_number = $websites_number;
while ($i <= $websites_number) {
	$websites_buttons_blue_mobile[$i] = '<button class="w3-btn w3-blue '.$websites_buttons_style.' '.$mobile_variable.'" title="'.$websites_names_array[$i].'" '.$roundedborderstyle.' onclick='.'"window.open('."'".$sitelinks[$i]."');".'"'."><".$h4_element.">".$websites_names_array[$i]."</".$h4_element."></button>";

	$i++;
}


#Stories Sites Buttons generator
$i = 0;
$storiessitenumb = $story_name_websites_number;
while ($i <= $storiessitenumb) {
	$story_name_websites_buttons[$i] = '<button class="w3-btn '.$websites_buttons_style.' '.$computer_variable.'" title="'.$story_namenames2[$i].'" '.$roundedborderstyle.' onclick='.'"window.open('."'".$story_namelinks[$i]."');".'"'."><".$h2_element.">".$story_namenames2[$i]."</".$h2_element."></button>";

	$i++;
}

$i = 0;
$storiessitenumb = $story_name_websites_number;
while ($i <= $storiessitenumb) {
	$story_name_websites_buttons_mobile[$i] = '<button class="w3-btn '.$websites_buttons_style.' '.$mobile_variable.'" title="'.$story_namenames2[$i].'" '.$roundedborderstyle.' onclick='.'"window.open('."'".$story_namelinks[$i]."');".'"'."><".$h4_element.">".$story_namenames2[$i]."</".$h4_element."></button>";

	$i++;
}


#Year Sites Buttons generator
$i = 0;
$z = 11;
while ($i <= $years_number) {
	$year_websites_buttons[$i] = '<button class="w3-btn '.$websites_buttons_style.' '.$computer_variable.'" title="'.$yearnames[$i].'" '.$roundedborderstyle.' onclick='.'"window.open('."'".$sitelinks[$z]."');".'"'."><".$h2_element.">".$yearnames[$i].": ".$icons[3]."</".$h2_element."></button>";

	$z++;
	$i++;
}

$i = 0;
$z = 11;
while ($i <= $years_number) {
	$year_websites_buttons_mobile[$i] = '<button class="w3-btn '.$websites_buttons_style.' '.$mobile_variable.'" title="'.$yearnames[$i].'" '.$roundedborderstyle.' onclick='.'"window.open('."'".$sitelinks[$z]."');".'"'."><".$h4_element.">".$yearnames[$i].": ".$icons[3]."</".$h4_element."></button>";

	$z++;
	$i++;
}

?>