<?php 

$i = 0;
$z = 0;

while ($i <= $to_watch_line_number - 1) {
	$i2 = $i + 1;
	if ($website_watch_history_show_to_watch_only_setting == True) {
		if (strpos ($to_watch_status_file_text[$i], $watched_string) == True) {
			$watch_status_css_class = 'watched_status';
			$watch_status_icon =  'fa-eye';
		}

		if (strpos ($to_watch_status_file_text[$i], $to_watch_string) == True) {
			$watch_status_css_class = 'to_watch_status';
			$watch_status_icon =  'fa-play';

			echo '<'.$m.' class="'.$watch_status_css_class.' '.$text_hover_white_css_class.' '.$computer_variable.' '.$zoom_animation_class.'">'.$i2." - (".$to_watch_media_type_text[$i].") - ".$to_watch_text[$i].' - <a href="vlc://file:///'.$medias_local_folder.$to_watch_folders_text[$i].'/'.str_replace('"', "", $to_watch_text[$i]).'.mp4"><i class="fas '.$watch_status_icon.'"></i></a>'."</".$m.">"."\n";
			echo "\n";
			echo '<h5 class="'.$watch_status_css_class.' '.$text_hover_white_css_class.' '.$mobile_variable.' '.$zoom_animation_class.'">'.$i2." - (".$to_watch_media_type_text[$i].") - ".$to_watch_text[$i].' - <a href="vlc://file:///'.$medias_local_folder.$to_watch_folders_text[$i].'/'.str_replace('"', "", $to_watch_text[$i]).'.mp4"><i class="fas '.$watch_status_icon.'"></i></a>'."</h5>"."\n";
		}

		$i++;
	}

	if ($website_watch_history_show_to_watch_only_setting == False) {
		if (strpos ($to_watch_status_file_text[$i], $watched_string) == True) {
			$watch_status_css_class = 'watched_status';
			$watch_status_icon =  'fa-eye';
		}

		if (strpos ($to_watch_status_file_text[$i], $to_watch_string) == True) {
			$watch_status_css_class = 'to_watch_status';
			$watch_status_icon =  'fa-play';
		}

		echo '<'.$m.' class="'.$watch_status_css_class.' '.$text_hover_white_css_class.' '.$computer_variable.' '.$zoom_animation_class.'">'.$i2." - (".$to_watch_media_type_text[$i].") - ".$to_watch_text[$i].' - <a href="vlc://file:///C:/Midias/'.$to_watch_folders_text[$i].'/'.str_replace('"', "", $to_watch_text[$i]).'.mp4"><i class="fas '.$watch_status_icon.'"></i></a>'."</".$m.">"."\n";
		echo "\n";
		echo '<h5 class="'.$watch_status_css_class.' '.$text_hover_white_css_class.' '.$mobile_variable.' '.$zoom_animation_class.'">'.$i2." - ".$to_watch_media_type_text[$i]." - ".$to_watch_text[$i].' - <a href="vlc://file:///C:/Midias/'.$to_watch_folders_text[$i].'/'.str_replace('"', "", $to_watch_text[$i]).'.mp4"><i class="fas '.$watch_status_icon.'"></i></a>'."</h5>"."\n";

		$i++;
	}
}

?>