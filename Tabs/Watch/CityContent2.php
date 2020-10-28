<?php 

$i = 0;
$z = 0;

while ($i <= $twnumbfile) {
	$i2 = $i + 1;
	if ($website_watch_history_show_to_watch_only_setting == true) {
		if (strpos ($twstatustxt[$i], 'w') == true) {
			$watch_status_css_class = 'watched_status';
			$watch_status_icon =  'fa-eye';
		}

		if (strpos ($twstatustxt[$i], 'tw') == true) {
			$watch_status_css_class = 'to_watch_status';
			$watch_status_icon =  'fa-play';

			echo '<'.$m.' class="'.$watch_status_css_class.' '.$text_hover_white_css_class.' '.$computer_variable.' '.$zoom_animation_class.'">'.$i2." - (".$twmediatypetxt[$i].") - ".$twtxt[$i].' - <a href="vlc://file:///C:/Midias/'.$twmediatxt[$i].'/'.str_replace('"', "", $twtxt[$i]).'.mp4"><i class="fas '.$watch_status_icon.'"></i></a>'."</".$m.">"."\n";
			echo "\n";
			echo '<h5 class="'.$watch_status_css_class.' '.$text_hover_white_css_class.' '.$mobile_variable.' '.$zoom_animation_class.'">'.$i2." - (".$twmediatypetxt[$i].") - ".$twtxt[$i].' - <a href="vlc://file:///C:/Midias/'.$twmediatxt[$i].'/'.str_replace('"', "", $twtxt[$i]).'.mp4"><i class="fas '.$watch_status_icon.'"></i></a>'."</h5>"."\n";
		}

		$i++;
	}

	if ($website_watch_history_show_to_watch_only_setting == false) {
		if (strpos ($twstatustxt[$i], 'w') == true) {
			$watch_status_css_class = 'w';
			$watch_status_icon =  'fa-eye';
		}

		if (strpos ($twstatustxt[$i], 'tw') == true) {
			$watch_status_css_class = 'tw';
			$watch_status_icon =  'fa-play';
		}

		echo '<'.$m.' class="'.$watch_status_css_class.' '.$text_hover_white_css_class.' '.$computer_variable.' '.$zoom_animation_class.'">'.$i2." - (".$twmediatypetxt[$i].") - ".$twtxt[$i].' - <a href="vlc://file:///C:/Midias/'.$twmediatxt[$i].'/'.str_replace('"', "", $twtxt[$i]).'.mp4"><i class="fas '.$watch_status_icon.'"></i></a>'."</".$m.">"."\n";
		echo "\n";
		echo '<h5 class="'.$watch_status_css_class.' '.$text_hover_white_css_class.' '.$mobile_variable.' '.$zoom_animation_class.'">'.$i2." - ".$twmediatypetxt[$i]." - ".$twtxt[$i].' - <a href="vlc://file:///C:/Midias/'.$twmediatxt[$i].'/'.str_replace('"', "", $twtxt[$i]).'.mp4"><i class="fas '.$watch_status_icon.'"></i></a>'."</h5>"."\n";

		$i++;
	}
}

?>