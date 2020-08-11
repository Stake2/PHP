<?php 

$pqntbg = 'bg shakesidetoside';
$pqnttext = 'darkpqnttext shakesidetoside';
$slbg = 'sl3 shakesidetoside';
$lsbg = 'darksl lstext shakesidetoside';

$cover_text = 'Cover';
$pequenata_online_cover_folder = $cdn_image_stories.'Pequenata/Capas/Kids/';
$nazzevo_online_cover_folder = $cdn_image_stories.'Nazzevo/Capas/';
$story_cover_image_filename = '1';

if ($lang == $geral_lang) {
	$lang = $enus_lang;

	$pequenata_folder = $pequenata_online_cover_folder.strtoupper($lang).'/'.$cover_text.'/';
	$nazzevo_folder = $nazzevo_online_cover_folder.strtoupper($lang).'/'.$cover_text.'/';

	$pqntimglink = $pequenata_folder.$story_cover_image_filename.'.png';
	$nazzevoimglink = $nazzevo_folder.$story_cover_image_filename.'.png';

	$lang = $geral_lang;
}

else {
	if (in_array($lang, $en_langs)) {
		$pequenata_folder = $pequenata_online_cover_folder.strtoupper($lang).'/'.$cover_text.'/';
		$nazzevo_folder = $nazzevo_online_cover_folder.strtoupper($lang).'/'.$cover_text.'/';

		$pqntimglink = $pequenata_folder.$story_cover_image_filename.'.png';
		$nazzevoimglink = $nazzevo_folder.$story_cover_image_filename.'.png';
	}

	if (in_array($lang, $pt_langs)) {
		$pequenata_folder = $pequenata_online_cover_folder.strtoupper($ptbr_lang).'/'.$cover_text.'/';
		$nazzevo_folder = $nazzevo_online_cover_folder.strtoupper($ptbr_lang).'/'.$cover_text.'/';

		$pqntimglink = $pequenata_folder.$story_cover_image_filename.'.png';
		$nazzevoimglink = $nazzevo_folder.$story_cover_image_filename.'.png';
	}
}

$pqntlink = $url.'/pequenata/';

$sllink = $url.'/new_world/spaceliving/';
$slimglink = $cdnimg.'SpaceLiving Logo.jpg';

$nazzevolink = $url.'/nazzevo/';

$lslink = $url.'/Lonely%20Stories/';
$lsimglink = $cdnimg.'Lonely Stories.jpg';

$story1 = '<a class="w3-btn  '.$cssbtn1.' '.$pqntbg.'" href="'.$pqntlink.'" '.$roundedborderstyle.'><'.$n.' class="'.$pqnttext.'"><b>'.$stories[0].'</b></'.$n.'><img src="'.$pqntimglink.'" width="650"><br /><br /></a><br />';
$story2 = '<a class="w3-btn '.$cssbtn1.' '.$slbg.'" href="'.$sllink.'" '.$roundedborderstyle.'><'.$n.' class="w3-text-blue"><b>'.$stories[1].'</b></'.$n.'><img src="'.$slimglink.'" width="650"><br /><br /></a><br />';
$story3 = '<a class="w3-btn '.$cssbtn1.' '.$pqntbg.'" href="'.$nazzevolink.'" '.$roundedborderstyle.'><'.$n.' class="'.$pqnttext.'"><b>'.$stories[2].'</b></'.$n.'><img src="'.$nazzevoimglink.'" width="650"><br /><br /></a><br />';
$story4 = '<a class="w3-btn '.$cssbtn1.' '.$lsbg.'" href="'.$lslink.'" '.$roundedborderstyle.'><'.$n.'><b>'.$stories[3].'</b></'.$n.'><img src="'.$lsimglink.'" width="650"><br /><br /></a><br />';

$story1m = '<a class="w3-btn '.$cssbtn1.' '.$pqntbg.'" href="'.$pqntlink.'" '.$roundedborderstyle.'><'.$m.' class="'.$pqnttext.'"><b>'.$stories[0].'</b></'.$m.'><img src="'.$pqntimglink.'" width="350" height="210"><br /><br /></a><br />';
$story2m = '<a class="w3-btn  '.$cssbtn1.' '.$slbg.'" href="'.$sllink.'" '.$roundedborderstyle.'><'.$m.' class="w3-text-blue"><b>'.$stories[1].'</b></'.$m.'><img src="'.$slimglink.'" width="320" height="230"><br /><br /></a><br />';
$story3m = '<a class="w3-btn '.$cssbtn1.' '.$pqntbg.'" href="'.$nazzevolink.'" '.$roundedborderstyle.'><'.$m.' class="'.$pqnttext.'"><b>'.$stories[2].'</b></'.$m.'><img src="'.$nazzevoimglink.'" width="290" height="190"><br /><br /></a><br />';
$story4m = '<a class="w3-btn '.$cssbtn1.' '.$lsbg.'" href="'.$lslink.'" '.$roundedborderstyle.'><'.$m.'><b>'.$stories[3].'</b></'.$m.'><img src="'.$lsimglink.'" width="290" height="190"><br /><br /></a><br />';

$storieslinkstab = "\n".
$story1."<br /> "."\n"."\n".
$story2."<br /> "."\n"."\n".
$story3."<br /> "."\n"."\n".
$story4."\n";

$storieslinkstabm = "\n".
$story1m."<br /> "."\n"."\n".
$story2m."<br /> "."\n"."\n".
$story3m."<br /> "."\n"."\n".
$story4m."\n";

?>