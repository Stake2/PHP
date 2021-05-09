<?php 

#Comment form
echo '<'.$m.'>'."\n".'<b>'."\n";
echo $div_zoom_animation."\n";
echo $website_comment_form;
echo "\n".'</b>'."\n".'</'.$m.'>'."\n";

$commentslens = array(45, 47, 52, 43, 49, 56, 21, 22, 54, 50);
$commentslens2 = array(45, 52);

$comment_style = $additional_background_color." ".$text_black_css_class." ".$border_3px_solid_black_css_class;

if ($website_has_comments_tab == True and $website_has_comments == True) {
	if ($website_shows_comments == True) {
		$c = 0;
		$i = 0;
		$z = 0;
		while ($c <= $comments_number) {
			if (isset($comments[$i])) {
				$comment_form_name[$z] = $comments[$i];
				$i++;
			}

			if (isset($comments[$i])) {
				$comentter_name[$z] = $comments[$i];
				$i++;
			}

			if (isset($comments[$i])) {
				$comment_text[$z] = $comments[$i];
				$i++;
			}

			if (isset($comments[$i])) {
				$comment_time[$z] = $comments[$i];
				$i++;
			}

			$c++;
			$z++;
		}

		if ($website_comments_number != 0) {
			echo '<hr class="'.$alternative_tab_full_border.'" />'."\n";

			if (isset($tabnames[7])) {
				echo $div_zoom_animation.'<'.$n.'><p></p><br /><b>'.$tabnames[7].': '.$orangespan.$website_comments_number.$spanc.' '.$icons[12].'</b><br /><br /><p></p></'.$n.'>'.$div_close.'<hr class="'.$alternative_tab_full_border.'" />'."\n";
			}

			if (!isset($tabnames[7])) {
				echo $div_zoom_animation.'<'.$n.'><p></p><br /><b>'.$tabnames[6].': '.$orangespan.$website_comments_number.$spanc.' '.$icons[12].'</b><br /><br /><p></p></'.$n.'>'.$div_close.'<hr class="'.$alternative_tab_full_border.'" />'."\n";
			}
		}

		$i = 0;
		$z = 0;
		if (isset($comment_time[$z])) {
			while ($z <= $comments_number) {
				$comment_time[$z] = substr($comment_time[$z], 0, -1);
				$comment_time[$z] = date("H:i d/m/Y", strtotime($comment_time[$z]));

				$z++;
			}
		}

		$a = 0;
		$z = 0;
		$i = 0;
		while ($a <= $comments_number) {
			if (in_array($website_language, $en_languages_array)) {
				$comment_form_name[$i] = '<b>'.$comments_texts_array[2].' '.$comments_texts_array[4].' '.strtolower($form_text).':</b> "'.ucwords($comment_form_name[$i]).'"';
			}

			if (in_array($website_language, $pt_languages_array)) {
				$comment_form_name[$i] = '<b>'.$comments_texts_array[2].' '.$comments_texts_array[3].' '.strtolower($form_text).':</b> "'.ucwords($comment_form_name[$i]).'"';
			}

			$a++;
			$z++;
			$i++;
		}

		echo "\n";

		$a = 0;
		$a2 = 1;
		$i = 0;
		$z = 0;
		$c = 0;
		$v = 0;
		$b = 0;
		$number_of_chapter_comments = 0;
		while ($c <= $comments_number) {
			if (in_array(strlen($comment_form_name[$a]), $commentslens) and $website_name == $website_nazzevo) {
				$website_comments[$b] = '<'.$m.' class="'.$comment_style.'" style="text-align:left;'.$rounded_border_style_2.'">'."\n".'<div style="margin-left:5%;margin-right:5%;">'."\n".'<br />'."\n".'<b>'.$a2.' - '.$comentter_name[$i].'</b> - '.$comment_time[$i]."\n".'<br />'.$comment_form_name[$i].' '."\n".'<hr class="'.$third_full_border.'" />'."\n".$comment_text[$i]."\n".'<br /><br /><br /><br /><br />'."\n".$div_close."\n".'</'.$m.'>'."\n"."<br />"."\n"."\n";

				if ($website_name == $website_nazzevo and strlen($comment_form_name[$a]) == 43) {
					echo $website_comments[$b];
				}

				$a2++;
				$b++;
			}

			if (in_array(strlen($comment_form_name[$a]), $commentslens) and $website_name != $website_nazzevo) {
				$website_comments[$b] = '<'.$m.' class="'.$comment_style.'" style="text-align:left;'.$rounded_border_style_2.'">'."\n".'<div style="margin-left:5%;margin-right:5%;">'."\n".'<br />'."\n".'<b>'.$a2.' - '.$comentter_name[$i].'</b> - '.$comment_time[$i]."\n".'<br />'.$comment_form_name[$i].' '."\n".'<hr class="'.$third_full_border.'" />'."\n".$comment_text[$i]."\n".'<br /><br /><br /><br /><br />'."\n".$div_close."\n".'</'.$m.'>'."\n"."<br />"."\n"."\n";

				if ($website_name == $website_nazzevo and strlen($comment_form_name[$a]) == 43) {
					echo $website_comments[$b];
				}

				$a2++;
				$b++;
			}

			if (in_array(strlen($comment_form_name[$a]), $commentslens) and $website_name != $website_nazzevo) {
				$story_chapter_comments_array[$v] = '<'.$m.' class="'.$comment_style.'" style="text-align:left;'.$rounded_border_style_2.'">'."\n".'<div style="margin-left:5%;margin-right:5%;">'."\n".'<br />'."\n".'<b>'.$a2.' - '.$comentter_name[$i].'</b> - '.$comment_time[$i]."\n".'<br />'.$comment_form_name[$i].' '."\n".'<hr class="'.$third_full_border.'" />'.$comment_text[$i]."\n".'<br /><br /><br /><br /><br />'."\n".$div_close."\n".'</'.$m.'>'."\n"."<br />"."\n"."\n";

				#echo $story_chapter_comments_array[$z];

				$v++;
				$number_of_chapter_comments++;
			}

			if ($website_name == $website_nazzevo and in_array(strlen($comment_form_name[$a]), $commentslens2)) {
				$a2 = $a2;
				$story_chapter_comments_array[$v] = '<'.$m.' class="'.$comment_style.'" style="text-align:left;'.$rounded_border_style_2.'">'."\n".'<div style="margin-left:5%;margin-right:5%;">'."\n".'<br />'."\n".'<b>'.$a2.' - '.$comentter_name[$i].'</b> - '.$comment_time[$i]."\n".'<br />'.$comment_form_name[$i].' '."\n".'<hr class="'.$third_full_border.'" />'.$comment_text[$i]."\n".'<br /><br /><br /><br /><br />'."\n".$div_close."\n".'</'.$m.'>'."\n"."<br />"."\n"."\n";

				#echo $story_chapter_comments_array[$z];
				$v++;
				$number_of_chapter_comments++;
			}

			$a++;
			$i++;
			$z++;
			$c++;
		}

		$z = 0;
		$c = 0;
		while ($c <= $website_comments_number_to_show) {
			if (!strpos($website_comments[$z], 'comment-') and isset($website_comments[$z])) {
				echo $website_comments[$z];
			}

			$z++;
			$c++;
		}
	}
}

#if ($sitecomments == True) {
#	echo '<hr class="'.$third_full_border.'" />'."\n";
#	echo $div_zoom_animation.'<'.$n.'><p></p><br /><b>'.$tabnames[7].': '.$orangespan.$comments_number.$spanc.' '.$icons[12].'</b><br /><br /><p></p></'.$n.'>'.$div_close.'<hr class="'.$sitehr.'" />'."\n";
#	
#	$i = 0;
#	$z = 0;
#	while ($z <= $story_comments_number_file) {
#		$i2 = $z + 2;
#		$comments[$i2] = substr($comments[$i2], 0, -1);
#		$comments[$i2] = date("H:i d/m/Y", strtotime($comments[$i2]));
#	
#		$z++;
#		$z++;
#		$z++;
#	}
#	
#	$a = 0;
#	$z = 0;
#	$i = 0;
#	while ($a <= $cmntscheckfilenumb) {
#		if (in_array($website_language, $en_languages_array)) {
#			$commentscheckstext[$i] = '<b>'.$commenttxt3.' '.$commenttxt5.' '.strtolower($form_text).':</b> "'.ucwords($commentscheck[$i]).'"';
#		}
#	
#		if (in_array($website_language, $pt_languages_array)) {
#			$commentscheckstext[$i] = '<b>'.$commenttxt3.' '.$commenttxt4.' '.strtolower($form_text).':</b> "'.ucwords($commentscheck[$i]).'"';
#		}
#	
#		$a++;
#		$z++;
#		$i++;
#	}
#		
#	$i = 0;
#	$a = 0;
#	$a2 = 1;
#	$z = 0;
#	
#	$b = 0;
#	$c = 0;
#	$c2 = 1;
#	$v = 0;
#	while ($i <= $story_comments_number_file) {
#		$i2 = $i + 1;
#		$i3 = $i + 2;
#		$b2 = $b + 1;
#		$b3 = $b + 2;
#	
#		if (strlen($commentscheck[$a]) == 17) {
#			$website_comments[$v] = '<'.$m.' class="'.$alternative_full_tab_style.'" style="text-align:left;border-width:3px;border-color:'.$bordercolor.';border-style:solid;"><div style="margin-left:5%;margin-right:5%;">'.'<br /><b>'.$c2.' - '.$comments[$b].'</b> - '.$comments[$b3].'<br />'.$commentscheckstext[$c].' '.'<hr class="'.$third_full_border.'" />'.$comments[$b2].'<br /><br /><br /><br /><br />'.$div_close.'</'.$m.'>'."<br />"."\n";
#	
#			echo $website_comments[$v];
#	
#			$c2++;
#		}
#	
#		if (strlen($commentscheck[$a]) == 19) {
#			$story_chapter_comments_array[$z] = '<'.$m.' class="'.$alternative_full_tab_style.'" style="text-align:left;border-width:3px;border-color:'.$bordercolor.';border-style:solid;"><div style="margin-left:5%;margin-right:5%;">'.'<br /><b>'.$a2.' - '.$comments[$i].'</b> - '.$comments[$i3].'<br />'.$commentscheckstext[$a].' '.'<hr class="'.$third_full_border.'" />'.$comments[$i2].'<br /><br /><br /><br /><br />'.$div_close.'</'.$m.'>'."<br />"."\n";
#	
#			#echo $story_chapter_comments_array[$z];
#	
#			$z++;
#			$a2++;
#		}
#	
#		$b++;
#		$b++;
#		$b++;
#		$c++;
#		$v++;
#	
#		$i++;
#		$i++;
#		$i++;
#		$a++;
#	}
#}

?>