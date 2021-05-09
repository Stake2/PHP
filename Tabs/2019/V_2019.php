<?php 

# Folder variables
$selected_website_url = $main_website_url.$website_folder.'/';
$selected_website_folder = $php_folder_tabs.ucwords($selected_website).'/';

$thingsnumb = 524;
$watched_number_ = $watched_episodes_2019_line_number;

$watched_movies_number = 4; 
$watched_series_number = 9; 
$watched_cartoons_number = 60;
$watched_animes_number = 87;
$watched_videos_number = 134;

$story_namenumb = 4;
$websites_number = 11;
$a = 24;
$friendsnumb = $yearnumbs2019txt[$a];
$cmntsnumb1 = 92;
$cmntsnumb2 = 183;
$tasksnumb = 44;

#Line number for the 2019 Watched VideoTypes.txt
$original1 = 12;
$original2 = 18;
$original3 = 29;
$original4 = 91;
$original5 = 180;

$media_type_movies_line = $original1;
$media_type_series_line = $original2;
$media_type_cartoons_line = $original3;
$media_type_animes_line = $original4;
$media_type_videos_line = $original5;

$strycapnumb = array(1, 13, 5, 1, 15);
$strywordnumb = array(512, 17.374, '7.440', 1.218, 7.401);
$strycharnumb = 41.162;

$mediabtns = '<'.$n.' class="'.$computer_variable.' '.$colortext3.'" '.$marginstyle4.'>'.$readmorestyle.$langreadtext.' '.$computer_buttons[1].$spanc.$div_close.'</'.$n.'>
<'.$m.' class="'.$mobile_variable.' '.$colortext3.'" '.$marginstyle2m2.'>'.$readmorestylem.$langreadtext.' '.$mobile_buttons[1].$spanc.$div_close.'</'.$m.'>';

$friendsbtns = '<'.$n.' class="'.$computer_variable.' '.$colortext3.'" '.$marginstyle22.'>'.$readmorestyle.$langreadtext.' '.$computer_buttons[2].$spanc.$div_close.'</'.$n.'>
<'.$m.' class="'.$mobile_variable.' '.$colortext3.'" '.$marginstyle2m.'>'.$readmorestylem.$langreadtext.' '.$mobile_buttons[2].$spanc.$div_close.'</'.$m.'>';

$pastebinlinks = array(
'<a href="https://pastebin.com/4j99vwMy">https://pastebin.com/4j99vwMy</a>', 
'<a href="https://pastebin.com/cx0jA1fx">https://pastebin.com/cx0jA1fx</a>',
'<a href="https://pastebin.com/FaGftvR0">https://pastebin.com/FaGftvR0</a>');

$citiestxts = array(
$langreadtext.': '.$siteicon,
$tabnames[1].': '.$icons[0],
$tabnames[2].': '.$icons[1],
$tabnames[3].': '.$icons[2],
$tabnames[4].': '.$icons[4],
$tabnames[5].': '.$icons[3],
);

#TabGenerator.php includer
require $website_tabs_generator;

?>