<?php 

#Comment form
echo '<'.$m.'>'."\n".'<b>'."\n";
echo $divzoomanim."\n";
echo $formcmnt;
echo "\n".'</b>'."\n".'</'.$m.'>'."\n";

$commentslens = array(45, 47, 52, 43, 49, 56, 21, 22, 54);
$commentslens2 = array(45, 52);

if ($sitehascommentstab == true and $sitehascomments == true) {
	if ($siteshowscomments == true) {
		$c = 0;
		$i = 0;
		$z = 0;
		while ($c <= $commentsnumb) {
			if (isset($comments[$i])) {
				$commentformname[$z] = $comments[$i];
				$i++;
			}

			if (isset($comments[$i])) {
				$commenttername[$z] = $comments[$i];
				$i++;
			}

			if (isset($comments[$i])) {
				$commenttext[$z] = $comments[$i];
				$i++;
			}

			if (isset($comments[$i])) {
				$commenttime[$z] = $comments[$i];
				$i++;
			}

			$c++;
			$z++;
		}

		if ($commentsnormalnumb != 0) {
			echo '<hr class="'.$sitehr2.'" />'."\n";

			echo $divzoomanim.'<'.$n.'><p></p><br /><b>'.$tabnames[7].': '.$orangespan.$commentsnormalnumb.$spanc.' '.$icons[12].'</b><br /><br /><p></p></'.$n.'>'.$divc.'<hr class="'.$sitehr.'" />'."\n";
		}

		$i = 0;
		$z = 0;
		if (isset($commenttime[$z])) {
			while ($z <= $commentsnumb) {
				$commenttime[$z] = substr($commenttime[$z], 0, -1);
				$commenttime[$z] = date("H:i d/m/Y", strtotime($commenttime[$z]));

				$z++;
			}
		}

		$a = 0;
		$z = 0;
		$i = 0;
		while ($a <= $commentsnumb) {
			if (in_array($lang, $en_langs)) {
				$commentformname[$i] = '<b>'.$cmntstxts[2].' '.$cmntstxts[4].' '.strtolower($formtxt).':</b> "'.ucwords($commentformname[$i]).'"';
			}

			if (in_array($lang, $pt_langs)) {
				$commentformname[$i] = '<b>'.$cmntstxts[2].' '.$cmntstxts[3].' '.strtolower($formtxt).':</b> "'.ucwords($commentformname[$i]).'"';
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
		$commentschapternumb = 0;
		while ($c <= $commentsnumb) {
			if (in_array(strlen($commentformname[$a]), $commentslens) and $sitename == $sitenazzevo) {
				$cmntsgeral[$b] = '<'.$m.' class="'.$textstyle2.'" style="text-align:left;border-width:3px;border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle2.'">'."\n".'<div style="margin-left:5%;margin-right:5%;">'."\n".'<br />'."\n".'<b>'.$a2.' - '.$commenttername[$i].'</b> - '.$commenttime[$i]."\n".'<br />'.$commentformname[$i].' '."\n".'<hr class="'.$sitehr3.'" />'."\n".$commenttext[$i]."\n".'<br /><br /><br /><br /><br />'."\n".$divc."\n".'</'.$m.'>'."\n"."<br />"."\n"."\n";

				if ($sitename == $sitenazzevo and strlen($commentformname[$a]) == 43) {
					echo $cmntsgeral[$b];
				}

				$a2++;
				$b++;
			}

			if (in_array(strlen($commentformname[$a]), $commentslens) and $sitename != $sitenazzevo) {
				$cmntsgeral[$b] = '<'.$m.' class="'.$textstyle2.'" style="text-align:left;border-width:3px;border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle2.'">'."\n".'<div style="margin-left:5%;margin-right:5%;">'."\n".'<br />'."\n".'<b>'.$a2.' - '.$commenttername[$i].'</b> - '.$commenttime[$i]."\n".'<br />'.$commentformname[$i].' '."\n".'<hr class="'.$sitehr3.'" />'."\n".$commenttext[$i]."\n".'<br /><br /><br /><br /><br />'."\n".$divc."\n".'</'.$m.'>'."\n"."<br />"."\n"."\n";

				if ($sitename == $sitenazzevo and strlen($commentformname[$a]) == 43) {
					echo $cmntsgeral[$b];
				}

				$a2++;
				$b++;
			}

			if (in_array(strlen($commentformname[$a]), $commentslens) and $sitename != $sitenazzevo) {
				$cmntschapter[$v] = '<'.$m.' class="'.$textstyle2.'" style="text-align:left;border-width:3px;border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle2.'">'."\n".'<div style="margin-left:5%;margin-right:5%;">'."\n".'<br />'."\n".'<b>'.$a2.' - '.$commenttername[$i].'</b> - '.$commenttime[$i]."\n".'<br />'.$commentformname[$i].' '."\n".'<hr class="'.$sitehr3.'" />'.$commenttext[$i]."\n".'<br /><br /><br /><br /><br />'."\n".$divc."\n".'</'.$m.'>'."\n"."<br />"."\n"."\n";

				#echo $cmntschapter[$z];

				$v++;
				$commentschapternumb++;
			}

			if ($sitename == $sitenazzevo and in_array(strlen($commentformname[$a]), $commentslens2)) {
				$a2 = $a2;
				$cmntschapter[$v] = '<'.$m.' class="'.$textstyle2.'" style="text-align:left;border-width:3px;border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle2.'">'."\n".'<div style="margin-left:5%;margin-right:5%;">'."\n".'<br />'."\n".'<b>'.$a2.' - '.$commenttername[$i].'</b> - '.$commenttime[$i]."\n".'<br />'.$commentformname[$i].' '."\n".'<hr class="'.$sitehr3.'" />'.$commenttext[$i]."\n".'<br /><br /><br /><br /><br />'."\n".$divc."\n".'</'.$m.'>'."\n"."<br />"."\n"."\n";

				#echo $cmntschapter[$z];
				$v++;
				$commentschapternumb++;
			}

			$a++;
			$i++;
			$z++;
			$c++;
		}

		$z = 0;
		$c = 0;
		while ($c <= $commentsnormalnumbtowrite) {
			if (!strpos($cmntsgeral[$z], 'comment-') and isset($cmntsgeral[$z])) {
				echo $cmntsgeral[$z];
			}

			$z++;
			$c++;
		}
	}
}

#if ($sitecomments == true) {
#	echo '<hr class="'.$sitehr2.'" />'."\n";
#	echo $divzoomanim.'<'.$n.'><p></p><br /><b>'.$tabnames[7].': '.$orangespan.$commentsnumb.$spanc.' '.$icons[12].'</b><br /><br /><p></p></'.$n.'>'.$divc.'<hr class="'.$sitehr.'" />'."\n";
#	
#	$i = 0;
#	$z = 0;
#	while ($z <= $cmntsfile) {
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
#		if ($lang == $langs[0] or $lang == $langs[1]) {
#			$commentscheckstext[$i] = '<b>'.$commenttxt3.' '.$commenttxt5.' '.strtolower($formtxt).':</b> "'.ucwords($commentscheck[$i]).'"';
#		}
#	
#		if ($lang == $langs[2]) {
#			$commentscheckstext[$i] = '<b>'.$commenttxt3.' '.$commenttxt4.' '.strtolower($formtxt).':</b> "'.ucwords($commentscheck[$i]).'"';
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
#	while ($i <= $cmntsfile) {
#		$i2 = $i + 1;
#		$i3 = $i + 2;
#		$b2 = $b + 1;
#		$b3 = $b + 2;
#	
#		if (strlen($commentscheck[$a]) == 17) {
#			$cmntsgeral[$v] = '<'.$m.' class="'.$textstyle2.'" style="text-align:left;border-width:3px;border-color:'.$bordercolor.';border-style:solid;"><div style="margin-left:5%;margin-right:5%;">'.'<br /><b>'.$c2.' - '.$comments[$b].'</b> - '.$comments[$b3].'<br />'.$commentscheckstext[$c].' '.'<hr class="'.$sitehr3.'" />'.$comments[$b2].'<br /><br /><br /><br /><br />'.$divc.'</'.$m.'>'."<br />"."\n";
#	
#			echo $cmntsgeral[$v];
#	
#			$c2++;
#		}
#	
#		if (strlen($commentscheck[$a]) == 19) {
#			$cmntschapter[$z] = '<'.$m.' class="'.$textstyle2.'" style="text-align:left;border-width:3px;border-color:'.$bordercolor.';border-style:solid;"><div style="margin-left:5%;margin-right:5%;">'.'<br /><b>'.$a2.' - '.$comments[$i].'</b> - '.$comments[$i3].'<br />'.$commentscheckstext[$a].' '.'<hr class="'.$sitehr3.'" />'.$comments[$i2].'<br /><br /><br /><br /><br />'.$divc.'</'.$m.'>'."<br />"."\n";
#	
#			#echo $cmntschapter[$z];
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