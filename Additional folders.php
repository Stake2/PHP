<?php 

# Additional folders.php

# Additional year folders
foreach (range(2018, date("Y")) as $year) {
	# Language Year folders
	foreach ($Language -> languages["small"] as $local_language) {
		$full_language = $Language -> languages["full"][$local_language];

		if ($local_language == "general") {
			$local_language = "en";
			$full_language = $Language -> languages["full"][$local_language];
		}

		$folders["Mega"]["Notepad"]["Years"][$year][$local_language] = [
			"root" => $folders["Mega"]["Notepad"]["Years"][$year]["root"].$full_language."/"
		];

		# "Done tasks" folder
		$folder_name = $website["texts"]["done_tasks"][$local_language];
		$key = "done_tasks";

		$folders["Mega"]["Notepad"]["Years"][$year][$local_language][$key] = [
			"root" => $folders["Mega"]["Notepad"]["Years"][$year][$local_language]["root"].$folder_name."/"
		];

		# "Watched media" folder
		$folder_name = $website["texts"]["watched_media"][$local_language];
		$key = "watched_media";

		$folders["Mega"]["Notepad"]["Years"][$year][$local_language][$key] = [
			"root" => $folders["Mega"]["Notepad"]["Years"][$year][$local_language]["root"].$folder_name."/"
		];
	}
}

?>