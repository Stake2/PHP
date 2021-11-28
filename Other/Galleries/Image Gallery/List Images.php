<!doctype html>
<html>
<head>
<body>

	<form id="list_images" method="post" action="" enctype="multipart/form-data">
		<input type="text" name="folder" size="50" />
		<input type="submit" value="List images" name="list_images">
		<br />List images from links? <input type="checkbox" name="link" />
	</form>

	<?php

	$link_list_file = "C:/Mega/PHP/Image Gallery/Links.txt";

	if (is_file($link_list_file) == False) {
		$file = fopen($link_list_file, 'w');
	}

	$extensions_array = array("jpg", "jpeg", "png", "gif");


	if (isset($_POST['links_text'])) {
		$file = fopen($link_list_file, 'w');
		fwrite($file, $_POST['links_text']);
		fclose($file);
	}

	if(isset($_POST['list_images'])){
		if ($_POST['link'] != "on") {
			$folder = str_replace("\\", "/", $_POST['folder']).'/';
			$file = array_diff(scandir($folder), array('.', '..'));
			$images = array();

			$file = fopen($link_list_file, 'w');
			fwrite($file, $_POST['links_text']);
			fclose($file);

			foreach ($file as $file) {
				$file_extension = mb_strtolower(pathinfo($file, PATHINFO_EXTENSION));

				if(in_array($file_extension, $extensions_array) and !is_dir($folder.$file.'/')){
					array_push($images, $file);
				}
			}

			#echo count($images);
			if (count($images) == 0) {
				echo "<h2>This folder has no images."."<br />"."Please provide a folder that has images.</h2>"."<br />"."\n";
			}

			else {
				echo "<h2>Here are the images on folder $folder:</h2>"."<br />"."\n";

				foreach ($images as $image) {
					$image = $folder.$image;
					echo '<img src="file:///'.$image.'">'."<br />"."\n";
				}
			}
		}

		if ($_POST['link'] == "on") {
			echo '<form id="link_list" method="post" action="" enctype="multipart/form-data">'."\n".
		#'<input type="text" name="links_text" size="100" rows="15" />'."\n".
		'<textarea type="text" name="links_text" cols="40" rows="5"></textarea>'."\n".
		'<input type="submit" value="Send links" name="send_links">'."\n".
		'</form>'."\n";

			if (isset($_POST['links_text'])) {
				$file = fopen($link_list_file, 'w');
				fwrite($file, $_POST['links_text']);
				fclose($file);
			}
		}
	}

	if (file_exists($link_list_file) == True) {
		$link_list_file_fp = fopen($link_list_file, 'r', 'UTF-8');
		if ($link_list_file_fp) {
			$image_links = explode("\n", fread($link_list_file_fp, filesize($link_list_file)));
		}
	}

	$images = array();

	foreach ($image_links as $image_link) {
		array_push($images, $image_link);
	}

	echo "<h2>Here are the images on folder $folder:</h2>"."<br />"."\n";

	foreach ($images as $image) {
		echo '<img src="'.$image.'">'."<br />"."\n";
	}

    ?>

</body>
</html>