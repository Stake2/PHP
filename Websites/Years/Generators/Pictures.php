<?php 

# Pictures

$language = "pt";

if (isset($website["language"]) == True) {
	$language = $website["language"];
}

$full_language = $website["full_language"];

if ($language == "general") {
	$language = "en";
	$full_language = $Language -> languages["full"][$language];
}

$tab_content = [
	"Number" => 0,
	"Content" => ""
];

# Define the local and remote image folders
$local_folder = $website["data"]["folders"]["website"]["Images"]["Local"]["Pictures"]["root"];
$remote_folder = $website["data"]["folders"]["website"]["Images"]["Remote"]["Pictures"]["root"];

# List the folder contents
$contents = $Folder -> Contents($local_folder, $remote_folder);

# Tone
$tone = "dark";

$add_image_title = True;

# Iterate through the file keys
$i = 0;

# Store the file dictionary into a variable for later use
$files = $contents["File"]["Dictionary"];

# Reset the root file dictionary
$contents["File"]["Dictionary"] = [];

# Add the "Icon" image
$contents["File"]["Dictionary"]["Icon"] = [
	"Title" => $website["language_texts"]["website_2"],
	"Extension" => "png",
	"Path" => $website["data"]["image"]["link"]
];

# Re-add the old files that were inside the file dictionary
foreach (array_keys($files) as $key) {
	$contents["File"]["Dictionary"][$key] = $files[$key];
}

# Update the image title of the "Happy New Year" image
$contents["File"]["Dictionary"]["1 - Happy New Year"]["Title"] = $website["language_texts"]["happy_new_year"];

# Update the image title of the "Christmas" image
$contents["File"]["Dictionary"]["2 - Christmas"]["Title"] = $website["language_texts"]["christmas, title()"];

# List the file keys
$keys = array_keys($contents["File"]["Dictionary"]);

$i = 0;
$z = 1;
foreach ($keys as $key) {
	$key = (string)$key;

	# Get the file dictionary
	$file = $contents["File"]["Dictionary"][$key];

	if (in_array($file["Extension"], $website["Image formats"])) {
		$class = $website["data"]["style"]["background"]["theme"][$tone]." ".$website["style"]["box_shadow"]["theme"][$tone];

		$class .= " border_4px border_radius_5_cent";

		# Make the image text and element centered
		$image_string = '<center class="'.$class.'">'."\n";

		if ($i != 0) {
			# Create the "Previous image" button
			$h4 = HTML::Element("h4", $website["icons"]["arrow_left"]." ".$website["language_texts"]["previous_image"], "", "text_size ".$website["style"]["text"]["theme"]["dark"], ["new_line" => True, "tab" => "\t\t\t"]);

			$button = HTML::Element("button", $h4, "", "w3-btn ".$website["style"]["button"]["theme"]["light"], ["new_line" => True]);

			$a = HTML::Element("a", $button, 'href="#pictures_image_'.($z - 1).'" style="float: left; text-decoration: none; margin-top: 30px; margin-left: 30px;"', "");

			$previous_image_button = $a;

			# Add the button to the image string
			$image_string .= $previous_image_button;
		}

		if ($i != count($keys) - 1) {
			# Create the "Next image" button
			$h4 = HTML::Element("h4", $website["language_texts"]["next_image"]." ".$website["icons"]["arrow_right"], "", "text_size ".$website["style"]["text"]["theme"]["dark"], ["new_line" => True, "tab" => "\t\t\t"]);

			$button = HTML::Element("button", $h4, "", "w3-btn ".$website["style"]["button"]["theme"]["light"], ["new_line" => True]);

			$a = HTML::Element("a", $button, 'href="#pictures_image_'.($z + 1).'" style="float: right; text-decoration: none; margin-top: 30px; margin-right: 30px;"', "");

			$next_image_button = $a;

			# Add the button to the image string
			$image_string .= $next_image_button.
			"<br />"."\n";
		}

		if (
			$i != 1 or
			$i != count($keys) - 1
		) {
			$image_string .= "<br />"."\n".
			"<p></p>"."\n";
		}

		if ($i == count($keys) - 1) {
			$image_string .= "<br />"."\n";
		}

		# Add some spaces
		$image_string .= "<p></p>"."\n";

		if ($add_image_title == True) {
			# Create the image "Title" text
			$text = $website["language_texts"]["title, title()"].":"."\n".
			"<br />"."\n";

			# Make the title text bold
			$text = $HTML -> Element("b", $text)."\n";

			# Make the image title
			$title = $file["Title"];

			# Remove the "[number].1 - " text of the image title if it exists
			if (str_contains($title, $i.".1 - ")) {
				$title = str_replace($i.".1 - ", "", $title);
			}

			# Remove the "[number] - " text of the image title if it exists
			else {
				# Remove the "[number].1 - " text of the image title if it exists
				if (str_contains($title, $z.".1 - ")) {
					$title = str_replace($z.".1 - ", "", $title);
				}

				if (str_contains($title, $i." - ")) {
					$title = str_replace($i." - ", "", $title);
				}
			}

			# Remove the ".[extension]" of the image title if it exists
			foreach ($website["Image formats"] as $extension) {
				$extension = ".".$extension;

				if (str_contains($title, $extension)) {
					$title = str_replace($extension, "", $title);
				}
			}

			# Replace "-" with "/" on image titles that have a date
			$pattern = "/[0-9]{2}-[0-9]{2}-[0-9]{4}/i";

			if (preg_match($pattern, $title)) {
				$title = str_replace("-", "/", $title);

				$title = str_replace(";", ":", $title);
			}

			# Remove "[number] / " of the image title
			$date = "/\b[0-9]{2}\/[0-9]{2}\/[0-9]{4}\b/i";
			$time = "/\b[0-9]{2}:[0-9]{2}/i";

			if (
				preg_match($date, $title) == 1 and
				preg_match($time, $title) == 0
			) {
				$title = explode(" / ", $title)[1];
			}

			if (
				preg_match($date, $title) == 1 and
				preg_match($time, $title) == 1
			) {
				$title = explode(" / ", $title);

				if (isset($title[1])) {
					$title = $title[1];
				}

				else {
					$title = $title[0];
				}
			}

			# Add the title text and title to the image string
			$image_string .= $text.$title;

			# Add some spaces
			$image_string .= "<br />"."\n".
			"<p></p>"."\n";
		}

		else {
			# Create the image "Number" text
			$text = $website["language_texts"]["number, title()"].":".
			"<br />"."\n";

			# Make the number text bold
			$text = $HTML -> Element("b", $text)."\n";

			# Add the number text and number to the image string
			$image_string .= $text.$key;

			# Add some spaces
			$image_string .= "<br />"."\n".
			"<p></p>"."\n";
		}

		# Replace remote folder with the local PHP images folder
		# To test if the images appear correctly
		if ($parse == "/") {
			$php_folder = "/Images/";

			$file["Path"] = str_replace($website["folders"]["images"]["root"], $php_folder, $file["Path"]);
		}

		# Create the image class
		$class = $website["data"]["style"]["img"]["theme"]["light"];

		# Remove the border-radius
		$class = str_replace("border_radius_8_cent", "border_radius_1_cent", $class);

		# Define the attributes
		$attributes = 'style="max-width: 70%;"';

		# Add an alt text
		$attributes .= ' alt="'.$file["Title"].'"';

		# Add a title text
		$attributes .= ' title="'.$file["Title"].'"';

		# Add the image anchor
		$image_string .= '<a name="pictures_image_'.$z.'">'."\n";

		# Make the image element
		$image_string .= $HTML -> Image($file["Path"], $class, $attributes);

		# Add some spaces
		$image_string .= "<br />"."\n";

		if ($i != 0) {
			# Create the "Previous image" button
			$h4 = HTML::Element("h4", $website["icons"]["arrow_left"]." ".$website["language_texts"]["previous_image"], "", "text_size ".$website["style"]["text"]["theme"]["dark"], ["new_line" => True, "tab" => "\t\t\t"]);

			$button = HTML::Element("button", $h4, "", "w3-btn ".$website["style"]["button"]["theme"]["light"], ["new_line" => True]);

			$a = HTML::Element("a", $button, 'href="#pictures_image_'.($z - 1).'" style="float: left; text-decoration: none; margin-top: 20px; margin-left: 30px;"', "");

			# Add the button to the image string
			$image_string .= $previous_image_button;
		}

		if ($i != count($keys) - 1) {
			# Create the "Next image" button
			$h4 = HTML::Element("h4", $website["language_texts"]["next_image"]." ".$website["icons"]["arrow_right"], "", "text_size ".$website["style"]["text"]["theme"]["dark"], ["new_line" => True, "tab" => "\t\t\t"]);

			$button = HTML::Element("button", $h4, "", "w3-btn ".$website["style"]["button"]["theme"]["light"], ["new_line" => True]);

			$a = HTML::Element("a", $button, 'href="#pictures_image_'.($z + 1).'" style="float: right; text-decoration: none; margin-top: 20px; margin-right: 30px;"', "");

			# Add the button to the image string
			$image_string .= $next_image_button.
			"<br />"."\n";
		}

		if (
			$i != 0 or
			$i != count($keys) - 1
		) {
			$image_string .= "<br />"."\n".
			"<p></p>"."\n";
		}

		if ($i == count($keys) - 1) {
			$image_string .= "<br />"."\n";
		}

		# Create the image link button
		$h4 = HTML::Element("h4", $website["language_texts"]["open_image_in_a_new_tab"].": ".$website["icons"]["images"], "", "text_size ".$website["style"]["text"]["theme"]["dark"], ["new_line" => True, "tab" => "\t\t\t"]);

		$button = HTML::Element("button", $h4, 'onclick="window.open('."'".$file["Path"]."'".')" style="margin-bottom: 10px; margin-bottom: 10px;"', "w3-btn ".$website["style"]["button"]["theme"]["light"], ["new_line" => True]);

		# Add the image link button to the image string
		$image_string .= $button;

		$image_string .= "<p></p>"."\n";

		# Close the "center" tag
		$image_string .= "</center>";

		# Add a line break if it is needed
		if ($key != array_reverse($keys)[0]) {
			$image_string .= "<br />"."\n".
			"<br />"."\n";
		}

		# Add the image element to the tab content string
		$tab_content["Content"] .= $image_string;

		# Add to the tab content number
		$tab_content["Number"]++;
	}

	$i++;
	$z++;
}

# Add tab to tab templates
$website["tabs"]["templates"]["pictures"] = [
	"name" => $website["language_texts"]["pictures, title()"],
	"add" => " ".HTML::Element("span", $tab_content["Number"], "", $website["style"]["text"]["theme"]["dark"]),
	"text_style" => "text-align: left;",
	"icon" => "images",
	"content" => $tab_content["Content"]
];

?>