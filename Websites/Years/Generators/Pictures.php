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
$local_folder = $website["Data"]["Folders"]["Website"]["Images"]["Local"]["Pictures"]["root"];
$remote_folder = $website["Data"]["Folders"]["Website"]["Images"]["Remote"]["Pictures"]["root"];

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
	"Title" => $website["Language texts"]["website_2"],
	"Extension" => "png",
	"Path" => $website["Data"]["image"]["link"]
];

# Re-add the old files that were inside the file dictionary
foreach (array_keys($files) as $key) {
	$contents["File"]["Dictionary"][$key] = $files[$key];
}

# Update the image title of the "Happy New Year" image
if (isset($contents["File"]["Dictionary"]["1 - Happy New Year"]) == True) {
	$contents["File"]["Dictionary"]["1 - Happy New Year"]["Title"] = $website["Language texts"]["happy_new_year"];
}

# Update the image title of the "Christmas" image
if (isset($contents["File"]["Dictionary"]["2 - Merry Christmas"]) == True) {
	$contents["File"]["Dictionary"]["2 - Merry Christmas"]["Title"] = $website["Language texts"]["merry_christmas"];
}

# List the file keys
$keys = array_keys($contents["File"]["Dictionary"]);

$images = $keys;

$i = 0;
$z = 1;
foreach ($keys as $key) {
	$key = (string)$key;

	# Get the file dictionary
	$file = $contents["File"]["Dictionary"][$key];

	if (in_array($file["Extension"], $website["Image formats"])) {
		$class = $website["Data"]["Style"]["background"]["theme"][$tone]." ".$website["Style"]["box_shadow"]["theme"][$tone];

		$class .= " border_radius_5_cent ".$website["Data"]["Style"]["border_4px"]["theme"]["light"];

		# Make the image text and element centered
		$image_string = '<center class="'.$class.'">'."\n";

		$text_color = "white";

		if ($i != 0) {
			# Create the "Previous image" button
			$h4 = HTML::Element("h4", $website["Icons"]["arrow_left"]." ".$website["Language texts"]["previous_image"], "", "text_size ".$website["Style"]["text"]["theme"]["dark"], ["new_line" => True, "tab" => "\t\t\t"]);

			$button = HTML::Element("button", $h4, "", "w3-btn ".$website["Style"]["button"]["theme"]["light"], ["new_line" => True]);

			$a = HTML::Element("a", $button, 'href="#pictures_image_'.($z - 1).'" style="float: left; text-decoration: none; margin-top: 30px; margin-left: 30px;"', "");

			$previous_image_button = $a;

			# Add the button to the image string
			$image_string .= $previous_image_button;
		}

		if ($i != count($keys) - 1) {
			# Create the "Next image" button
			$h4 = HTML::Element("h4", $website["Language texts"]["next_image"]." ".$website["Icons"]["arrow_right"], "", "text_size ".$website["Style"]["text"]["theme"]["dark"], ["new_line" => True, "tab" => "\t\t\t"]);

			$button = HTML::Element("button", $h4, "", "w3-btn ".$website["Style"]["button"]["theme"]["light"], ["new_line" => True]);

			$a = HTML::Element("a", $button, 'href="#pictures_image_'.($z + 1).'" style="float: right; text-decoration: none; margin-top: 30px; margin-right: 30px;"', "");

			$next_image_button = $a;

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

		if (
			$i != 0 and
			$i != count($keys) - 1
		) {
			$image_string .= '<br class="mobile_inline_block" /><br class="mobile_inline_block" /><br class="mobile_inline_block" />';
		}

		# Add some spaces
		$image_string .= "<p></p>"."\n".
		'<br class="mobile_inline_block" /><br class="mobile_inline_block" />';

		# Define the text color
		$text_color = $website["Data"]["Style"]["text"]["theme"]["dark"];

		if ($add_image_title == True) {
			# Create the image "Title" text
			$text = $website["Language texts"]["title, title()"].":"."\n".
			"<br />"."\n";

			# Make the title text bold
			$text = $HTML -> Element("b", $text)."\n";

			# Make the image title
			$title = $file["Title"];

			$numbers = [
				"1",
				"2",
				"3"
			];

			foreach ($numbers as $number) {
				# Remove the "[number].[sub_number] - " text of the image title if it exists
				if (str_contains($title, $i.".".$number." - ")) {
					$title = str_replace($i.".".$number." - ", "", $title);
				}

				# Remove the "[number] - " text of the image title if it exists
				else {
					# Remove the "[number].1 - " text of the image title if it exists
					if (str_contains($title, $z.".".$number." - ")) {
						$title = str_replace($z.".".$number." - ", "", $title);
					}

					if (str_contains($title, $i." - ")) {
						$title = str_replace($i." - ", "", $title);
					}
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

			if (preg_match($pattern, $title, $matches)) {
				$title = str_replace("-", "/", $title);

				$title = str_replace(";", ":", $title);
			}

			$welcome_text = $website["Language texts"]["welcome, title()"];
			$replaced = str_replace("-", "/", $welcome_text);

			if (
				$language == "pt" and
				str_contains($title, $replaced)
			) {
				$title = str_replace($replaced, $welcome_text, $title);
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
			$image_string .= $HTML -> Element("span", $text.$title, "", $text_color);

			# Add some spaces
			$image_string .= "<br />"."\n".
			"<p></p>"."\n";
		}

		else {
			# Create the image "Number" text
			$text = $website["Language texts"]["number, title()"].":".
			"<br />"."\n";

			# Make the number text bold
			$text = $HTML -> Element("b", $text)."\n";

			# Add the number text and number to the image string
			$image_string .= $HTML -> Element("span", $text, "", $text_color).$z;

			# Add some spaces
			$image_string .= "<br />"."\n".
			"<p></p>"."\n";
		}

		# Replace remote folder with the local PHP images folder
		# To test if the images appear correctly
		if ($website["States"]["Website"]["Generate"] == False) {
			$php_folder = "/Images/";

			$file["Path"] = str_replace($website["Folders"]["Images"]["root"], $php_folder, $file["Path"]);
		}

		# Create the image class
		$class = $website["Data"]["Style"]["img"]["theme"]["light"];

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
			$h4 = HTML::Element("h4", $website["Icons"]["arrow_left"]." ".$website["Language texts"]["previous_image"], "", "text_size ".$website["Style"]["text"]["theme"]["dark"], ["new_line" => True, "tab" => "\t\t\t"]);

			$button = HTML::Element("button", $h4, "", "w3-btn ".$website["Style"]["button"]["theme"]["light"], ["new_line" => True]);

			$a = HTML::Element("a", $button, 'href="#pictures_image_'.($z - 1).'" style="float: left; text-decoration: none; margin-top: 20px; margin-left: 30px;"', "");

			# Add the button to the image string
			$image_string .= $previous_image_button;
		}

		if ($i != count($keys) - 1) {
			# Create the "Next image" button
			$h4 = HTML::Element("h4", $website["Language texts"]["next_image"]." ".$website["Icons"]["arrow_right"], "", "text_size ".$website["Style"]["text"]["theme"]["dark"], ["new_line" => True, "tab" => "\t\t\t"]);

			$button = HTML::Element("button", $h4, "", "w3-btn ".$website["Style"]["button"]["theme"]["light"], ["new_line" => True]);

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
			"<p></p>"."\n".
			'<br class="mobile_inline_block" /><br class="mobile_inline_block" />';
		}

		if (
			$i != 0 and
			$i != count($keys) - 1
		) {
			$image_string .= '<br class="mobile_inline_block" />'.
			'<br class="mobile_inline_block" /><br class="mobile_inline_block" /><br class="mobile_inline_block" />';
		}

		if ($i == count($keys) - 1) {
			$image_string .= "<br />"."\n".
			'<br class="mobile_inline_block" /><br class="mobile_inline_block" />';
		}

		# Create the image link button
		$h4 = HTML::Element("h4", $website["Language texts"]["open_image_in_a_new_tab"].": ".$website["Icons"]["images"], "", "text_size ".$website["Style"]["text"]["theme"]["dark"], ["new_line" => True, "tab" => "\t\t\t"]);

		$button = HTML::Element("button", $h4, 'onclick="window.open('."'".$file["Path"]."'".')" style="margin-bottom: 10px; margin-bottom: 10px;"', "w3-btn ".$website["Style"]["button"]["theme"]["light"], ["new_line" => True]);

		# Add the image link button to the image string
		$image_string .= $button;

		$image_string .= "<p></p>"."\n";

		# Close the "center" tag
		$image_string .= "</center>";

		# Add a line break if it is needed
		if ($key != end($keys)) {
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

if ($images != ["Icon"]) {
	# Add the tab to tab templates dictionary
	$website["tabs"]["templates"]["pictures"] = [
		"name" => $website["Language texts"]["pictures, title()"],
		"add" => " ".HTML::Element("span", $tab_content["Number"], "", $website["Style"]["text"]["theme"]["dark"]),
		"text_style" => "text-align: left;",
		"icon" => "images",
		"content" => $tab_content["Content"]
	];
}

# Define the "Pictures" tab to be removed if it only contains one picture (the image of the website)
if ($images == ["Icon"]) {
	array_push($website["tabs"]["To remove"], "pictures");
}

?>