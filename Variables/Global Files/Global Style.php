<?php 

$border_1px_solid_css_class = "border_1px";
$border_1px_solid_with_color_template = "border_1px_solid_";

$border_3px_solid_css_class = "border_3px";
$border_3px_solid_with_color_template = "border_3px_solid_";

$border_4px_solid_css_class = "border_4px";
$border_4px_solid_with_color_template = "border_4px_solid_";

$colors_array = array(
"grey",
"white",
"black",
"red",
"dark-red",
"blue",
"darker-blue",
"dark-blue",
"super-dark-blue",
"cyan",
"green-water",
"dark-green-water",
"yellow",
"yellow-sand",
"light-brown",
"brown",
"darker-brown",
"dark-brown",
"pink",
"dark-pink",
);

$border_1px_solid_array = array();
$border_3px_solid_array = array();
$border_4px_solid_array = array();
$border_color_array = array();
$background_hover_colors_array = array();
$text_hover_colors_array = array();
$background_colors_array = array();
$text_colors_array = array();

$css_class_arrays = array(
"border_1px_solid_array",
"border_3px_solid_array",
"border_4px_solid_array",
"border_color_array",
"background_hover_colors_array",
"text_hover_colors_array",
"background_colors_array",
"text_colors_array",
);

$css_class_arrays_selector_text = array(
"border_1px_solid_",
"border_3px_solid_",
"border_4px_solid_",
"border_color_",
"background_hover_",
"text_hover_",
"background_",
"text_",
);

$css_class_arrays_length = count($css_class_arrays) - 1;

$i = 0;
while ($i <= $css_class_arrays_length) {
	foreach ($colors_array as $color) {
		$replaced_color = str_replace("-", "_", $color);
		$color_text = $css_class_arrays_selector_text[$i].$replaced_color."_css_class";

		${"$color_text"} = $css_class_arrays_selector_text[$i].$replaced_color;

		array_push(${"$css_class_arrays[$i]"}, ${"$color_text"});
	}

	$i++;
}

$all_css_classes_arrays = array(
$border_1px_solid_array,
$border_3px_solid_array,
$border_4px_solid_array,
$border_color_array,
$background_hover_colors_array,
$text_hover_colors_array,
$background_colors_array,
$text_colors_array,
);

$website_style_file = $current_website_folder."Website Style.php";

$create_border_on_hover_css_class = "create_border_on_hover";

$default_background_color = $background_black_css_class;
$default_text_color = $text_black_css_class;
$default_border_size = $border_3px_solid_css_class;
$default_border_with_white_background_hover = $default_border_size." ".$background_hover_white_css_class;
$default_border_color = $border_color_black_css_class;
$default_background_hover_color = $background_hover_white_css_class;

$default_full_border = $default_border_size." ".$default_border_color." ".$default_background_hover_color;

$website_border_color = $default_border_color;

#$cssbtn1 = $default_full_border;
#$cssbtn2 = $create_border_on_hover_css_class;
#$cssbtn5 = "borderbtnblue";
#$classcsbtn4 = 'class="borderbtn3"';
$zoom_animation_class = 'w3-animate-zoom';
$bottanim = 'w3-animate-bottom';
$shake_side_to_side_animation = 'shake_side_to_side_animation';

$border_button_white = 'border_button_white';

$div_zoom_animation = '<div class="w3-animate-zoom">';
$div_bottom_animation = '<div class="w3-animate-bottom">';
$div_right_animation = '<div class="w3-animate-right">';
$div_left_animation = '<div class="w3-animate-left">';
$divlefta = '<div class="zoomnimateleft">';
$divrighta = '<div class="zoomnimateright">';
#$div_shake_animation = '<div class="animationthing">';

$div_text_align_left = '<div style="text-align:left;">';
$textalign_left = '<div style="text-align:left;">';

$mobile_variable = 'mobileShow';
$computer_variable = 'mobileHide';
$mobile_div = '<div class="'.$mobile_variable.'">';
$computer_div = '<div class="'.$computer_variable.'">';

$mobile_div = $mobile_div;
$computer_div = $computer_div;

$tab_style = 'city '.$computer_variable;
$tab_style_mobile = 'city '.$mobile_variable;

$chapter_image_style = 'style="float:left;border-width:3px;border-color:black;border-style:solid;"';

$n = 'h2';
$m = 'h4';

$blackspan = '<span class="w3-text-black">';
$whitespan = '<span class="w3-text-white">';
$bluespan = '<span class="w3-text-blue">';
$yellowspan = '<span class="w3-text-yellow">';
$pinkspan = '<span class="w3-text-pink">';
$purplespan = '<span class="w3-text-purple">';
$cyanspan = '<span class="w3-text-cyan">';
$greenspan = '<span class="w3-text-green">';
$greyspan = '<span class="w3-text-grey">';
$orangespan = '<span class="w3-text-orange">';
$redspan = '<span class="w3-text-red">';
$programmingspan = '<span class="w3-pale-blue w3-text-green">';
$writespan = '<span class="w3-lime w3-text-blue-grey">';
$spanc = '</span>';

$pc = '</p>';

$iframestyle = 'width="100%" height="650"';
$iframestylem = 'width="350" height="300"';

$div_close = '</div>';
$h1c = '</h1>';
$h2c = '</h2>';
$h4_close = '</h4>';
$big_space = '<div class="'.$computer_variable.'"><br /><br /><br /><br /><br /><br /><br /><br /></div>';
$big_space_mobile_and_computer = '<div class="'.$mobile_variable.'"><br /><br /><br />'.$div_close."\n".'<div class="'.$computer_variable.'"><br /><br /><br /><br /><br />'.$div_close."\n";

$margin_css_style = 'style="margin:10%;"';

$margin = '<div style="margin:3%;">';
$margin2 = '<div style="margin:3%;">';
$margin3 = '<div style="margin:5%;">';
$notifbtncss1 = 'float:left;margin-left:-7.3%;';
$notifbtncss2 = 'float:left;';

$margin_style_10percent = 'margin:10%;';

$css_font_size_20px = '20px_font_size';

$global_classes = ' 20px_font_size white_space_unset';
$websites_tab_global_number_color = "w3-text-blue";

$margin_3_h1 = '<h1 style="margin-left:3%;">'.'<b>';

if ($roundedbuttonson == True) {
	$roundedborderstyle = 'style="border-radius: 50px;"';
	$rounded_border_style_2 = 'border-radius: 50px;';
	$roundedborderstyle3 = 'border-radius: 32px;';
	$roundedborderstyle4 = 'border-radius: 25px;';
	$roundedborderstyle7 = 'border-radius: 20px;';
	$roundedborderstyle5 = 'border-radius: 250px;';
	$roundborderstyle6 = 'border-radius: 31px;';
	$roundeddiv = '<div style="border-radius: 50px;">';
}

else {
	$roundedborderstyle = '';
	$rounded_border_style_2 = '';
	$roundedborderstyle3 = '';
	$roundedborderstyle4 = '';
	$roundeddiv = '';
}

$margin_style_10percent_rounded_border = $margin_style_10percent.$rounded_border_style_2;

#Icons array
$icons = array(
$iconvideo = '<i class="fas fa-video"></i>', #0
$iconfriends = '<i class="fas fa-user-friends"></i>', #1
$iconimages = '<i class="fas fa-images"></i>', #2
$iconcalendar = '<i class="far fa-calendar-alt"></i>', #3
$icontasks = '<i class="fas fa-tasks"></i>', #4
$iconeye = '<i class="fas fa-eye"></i>', #5
$iconplay = '<i class="fas fa-play"></i>', #6
$iconglobe = '<i class="fas fa-globe"></i>', #7
$iconarchive = '<i class="fas fa-archive"></i>', #8
$iconexclamation = '<i class="fas fa-exclamation"></i>', #9
$iconpen = '<i class="fas fa-pen"></i>', #10
$iconbook = '<i class="fas fa-book"></i>', #11
$iconcomments = '<i class="fas fa-comments"></i>', #12
$iconbell = '<i class="fas fa-bell"></i>', #13
$iconpeoplecarry = '<i class="fas fa-people-carry"></i>', #14
$iconclipboard = '<i class="far fa-clipboard"></i>', #15
$iconthreebars = '<i class="fas fa-bars"></i>', #16
$iconarrowup = '<i class="fas fa-arrow-circle-up"></i>', #17
$iconarrowdown = '<i class="fas fa-arrow-circle-down"></i>', #18
$iconfilm = '<i class="fas fa-film"></i>', #19
$iconbookreader = '<i class="fas fa-book-reader"></i>', #20
$iconbookopen = '<i class="fas fa-book-open"></i>', #21
$icongamepad = '<i class="fas fa-gamepad"></i>', #22
$iconmusicnote = '<i class="fas fa-music"></i>', #23
$iconphp = '<i class="fab fa-php"></i>', #24
$iconpython = '<i class="fab fa-python"></i>', #25
$iconpaintbrush = '<i class="fas fa-paint-brush"></i>', #26
$iconedit = '<i class="fas fa-edit"></i>', #27
$iconarrowleft = '<i class="fas fa-arrow-circle-left"></i>', #28
$iconarrowright = '<i class="fas fa-arrow-circle-right"></i>', #29
$iconyoutube = '<i class="fab fa-youtube"></i>', #30
);

$icon_heart = '<i class="fas fa-heart"></i>';
$icon_heart_painted_red = $redspan.$icon_heart.$spanc;

$icon_smile_beam = '<i class="fas fa-smile-beam"></i>';
$icon_smile_beam_painted_black = $blackspan.$icon_smile_beam.$spanc;
$icon_smile_beam_painted_yellow = $yellowspan.$icon_smile_beam.$spanc;
$icon_smile_beam_painted_cyan = $cyanspan.$icon_smile_beam.$spanc;

$icon_plus = '<i class="fas fa-plus"></i>';

#$hstyle = 'margin:5%;';
#$hstyle2 = 'margin:10%;border-width:3px;border-color:'.$color.';border-style:solid;';
#$readmorestyle = '<div style="margin-top:5%;margin-bottom:5%;"><span style="margin-left:4%;">';
#$marginstyle2m = 'style="margin-right:32%;border-width:3px;border-color:'.$bordercolor.';border-style:solid;"';
#$marginstyle2m2 = 'style="margin-right:35%;border-width:3px;border-color:'.$bordercolor.';border-style:solid;"';
#$margincss1 = 'margin-left:11%;margin-right:11%;';
#$margincss2 = 'margin-left:10%;margin-right:10%;';
#$margincss3 = 'margin-left:5%;margin-right:5%;';
#$readmorestylem = '<div style="margin-top:5%;margin-bottom:5%;"><span style="margin-left:4%;">';

$color2 = 'yellow';
$sitewhilestyle = $color2;

$animationstylecss = '
<style>

</style>';

?>