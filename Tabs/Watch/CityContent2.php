<?php 

$i = 0;
$z = 0;

while ($i <= $twnumbfile) {
	$i2 = $i + 1;
	if ($twonly == true) {
		if (strpos ($twstatustxt[$i], 'w') == true) {
			$twstatus = 'w';
			$twstatusicon = 'fa-eye';
		}

		if (strpos ($twstatustxt[$i], 'tw') == true) {
			$twstatus = 'tw';
			$twstatusicon = 'fa-play';

			echo '<'.$m.' class="'.$twstatus.' '.$cssbtn4.' '.$computervar.' '.$zoomanim.'">'.$i2." - (".$twmediatypetxt[$i].") - ".$twtxt[$i].' - <a href="vlc://file:///C:/Midias/'.$twmediatxt[$i].'/'.str_replace('"', "", $twtxt[$i]).'.mp4"><i class="fas '.$twstatusicon.'"></i></a>'."</".$m.">"."\n";
			echo "\n";
			echo '<h5 class="'.$twstatus.' '.$cssbtn4.' '.$mobilevar.' '.$zoomanim.'">'.$i2." - (".$twmediatypetxt[$i].") - ".$twtxt[$i].' - <a href="vlc://file:///C:/Midias/'.$twmediatxt[$i].'/'.str_replace('"', "", $twtxt[$i]).'.mp4"><i class="fas '.$twstatusicon.'"></i></a>'."</h5>"."\n";
		}

		$i++;
	}

	if ($twonly == false) {
		if (strpos ($twstatustxt[$i], 'w') == true) {
			$twstatus = 'w';
			$twstatusicon = 'fa-eye';
		}

		if (strpos ($twstatustxt[$i], 'tw') == true) {
			$twstatus = 'tw';
			$twstatusicon = 'fa-play';
		}

		echo '<'.$m.' class="'.$twstatus.' '.$cssbtn4.' '.$computervar.' '.$zoomanim.'">'.$i2." - (".$twmediatypetxt[$i].") - ".$twtxt[$i].' - <a href="vlc://file:///C:/Midias/'.$twmediatxt[$i].'/'.str_replace('"', "", $twtxt[$i]).'.mp4"><i class="fas '.$twstatusicon.'"></i></a>'."</".$m.">"."\n";
		echo "\n";
		echo '<h5 class="'.$twstatus.' '.$cssbtn4.' '.$mobilevar.' '.$zoomanim.'">'.$i2." - ".$twmediatypetxt[$i]." - ".$twtxt[$i].' - <a href="vlc://file:///C:/Midias/'.$twmediatxt[$i].'/'.str_replace('"', "", $twtxt[$i]).'.mp4"><i class="fas '.$twstatusicon.'"></i></a>'."</h5>"."\n";

		$i++;
	}
}

?>