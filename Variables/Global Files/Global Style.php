<?php 

$text = 'pqnttext';
$color = 'bg';
$color3 = 'w3-white';
$colortext = 'w3-text-white';
$colorsubtext = 'w3-text-orange';
$colortext2 = 'w3-text-green';
$bordercolor = 'w3-black';
$colortext3 = 'w3-text-yellow';

$cssbtn1 = "borderbtn";
$cssbtn2 = "borderbtn2";
$cssbtn3 = "borderbtnblack2";
$cssbtn4 = "borderbtn3";
$cssbtn5 = 'borderbtnblue';
$classcsbtn4 = 'class="borderbtn3"';
$zoomanim = 'w3-animate-zoom';
$bottanim = 'w3-animate-bottom';
$shakesidetosideanim = 'shakesidetoside';

$divzoomanim = '<div class="w3-animate-zoom">';
$divbottanim = '<div class="w3-animate-bottom">';
$divrightanim = '<div class="w3-animate-right">';
$divleftanim = '<div class="w3-animate-left">';
$divlefta = '<div class="zoomnimateleft">';
$divrighta = '<div class="zoomnimateright">';
$divshakeanim = '<div class="animationthing">';
$divzoomanimlouco = '<div class="animationthing2">';

$divtextalignleft = '<div style="text-align:left;">';
$textalign_left = '<div style="text-align:left;">';

$mobilevar = 'mobileShow';
$computervar = 'mobileHide';
$mobilediv = '<div class="'.$mobilevar.'">';
$computerdiv = '<div class="'.$computervar.'">';

$mobile_div = $mobilediv;
$computer_div = $computerdiv;

$citystyle = 'city '.$computervar;
$citystylem = 'city '.$mobilevar;

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

$divc = '</div>';
$h1c = '</h1>';
$h2c = '</h2>';
$h4c = '</h4>';
$bigspace = '<div class="'.$computervar.'"><br /><br /><br /><br /><br /><br /><br /><br /></div>';
$bigspacemobileandcomputer = '<div class="'.$mobilevar.'"><br /><br /><br />'.$divc."\n".'<div class="'.$computervar.'"><br /><br /><br /><br /><br />'.$divc."\n";

$margin = '<div style="margin:3%;">';
$margin2 = '<div style="margin:3%;">';
$margin3 = '<div style="margin:5%;">';
$notifbtncss1 = 'float:left;margin-left:-10%;';
$notifbtncss2 = 'float:left;';

$margin_3_h1 = '<h1 style="margin-left:3%;">'.'<b>';

if ($roundedbuttonson == true) {
	$roundedborderstyle = 'style="border-radius: 50px;"';
	$roundedborderstyle2 = 'border-radius: 50px;';
	$roundedborderstyle3 = 'border-radius: 32px;';
	$roundedborderstyle4 = 'border-radius: 25px;';
	$roundedborderstyle5 = 'border-radius: 250px;';
	$roundborderstyle6 = 'border-radius: 31px;';
	$roundeddiv = '<div style="border-radius: 50px;">';
}

else {
	$roundedborderstyle = '';
	$roundedborderstyle2 = '';
	$roundedborderstyle3 = '';
	$roundedborderstyle4 = '';
	$roundeddiv = '';
}

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
$icon_smile_beam_painted_yellow = $yellowspan.$icon_smile_beam.$spanc;

$hstyle = 'margin:5%;';
$hstyle2 = 'margin:10%;border-width:3px;border-color:'.$color.';border-style:solid;';
$readmorestyle = '<div style="margin-top:5%;margin-bottom:5%;"><span style="margin-left:4%;">';
$marginstyle2m = 'style="margin-right:32%;border-width:3px;border-color:'.$bordercolor.';border-style:solid;"';
$marginstyle2m2 = 'style="margin-right:35%;border-width:3px;border-color:'.$bordercolor.';border-style:solid;"';
$margincss1 = 'margin-left:11%;margin-right:11%;';
$margincss2 = 'margin-left:10%;margin-right:10%;';
$margincss3 = 'margin-left:5%;margin-right:5%;';
$readmorestylem = '<div style="margin-top:5%;margin-bottom:5%;"><span style="margin-left:4%;">';

$color2 = 'yellow';
$sitewhilestyle = $color2;

$animationstylecss = '
<style>
@media only screen
  and (min-device-width : 320px)
  and (max-device-width : 684px){
    .videostyle {
		width: 350;
		height: 450;
	}
}

button:hover {
  /* Start the shake animation and make the animation last for 0.5 seconds */
  animation: shakesidetoside22 0.8s;
  /* When the animation is finished, start again */
  animation-iteration-count: infinite;
}

.shakesidetoside:hover {
  /* Start the shake animation and make the animation last for 0.5 seconds */
  animation: shakesidetoside22 0.8s;
  /* When the animation is finished, start again */
  animation-iteration-count: infinite;
}

.animationthing {
  /* Start the shake animation and make the animation last for 0.5 seconds */
  animation: shakesidetoside22 0.5s;
  /* When the animation is finished, start again */
  animation-iteration-count: infinite;
}

.animationthing2 {
  /* Start the shake animation and make the animation last for 0.5 seconds */
  animation: animatezoom22 0.5s;
  /* When the animation is finished, start again */
  animation-iteration-count: infinite;
}

@keyframes animatezoom22 {
  0% {transform: width(5px)} 
  100% {transform: width(15px)}
}

@keyframes shakesidetoside22 {
  0% {transform: translateX(-10px);} 
  50% {transform: translateX(10px);} 
  100% {transform: translateX(-10px);} 
}
</style>';

?>