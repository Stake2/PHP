<?php 

# Memories

$language = "pt";

if (isset($website["language"]) == True) {
	$language = $website["language"];
}

$tab_content = [
	"Number" => 0,
	"Content" => ""
];

# Define the local and remote image folders
$local_folder = $website["Data"]["Folders"]["Website"]["Images"]["Local"]["Memories"]["root"];
$remote_folder = $website["Data"]["Folders"]["Website"]["Images"]["Remote"]["Memories"]["root"];

# List the contents of the folder
$contents = $Folder -> Contents($local_folder, $remote_folder);

# Define the dates file
$file = $local_folder."Dates.txt";

if (file_exists($file) == True) {
	# List the file dates
	$times = $File -> Contents($file)["lines"];

	# Define a variable saying if the image title will be added
	$add_image_title = False;

	# Define the tone of the images
	$tone = "dark";

	# List the keys of the files
	$keys = array_keys($contents["File"]["Dictionary"]);
	unset($keys[count($keys) - 1]);

	# Iterate through the file keys
	$i = 1;
	$c = 0;
	foreach ($keys as $key) {
		# Get the file dictionary
		$file = $contents["File"]["Dictionary"][$key];

		# Define the default "Is multi-language" switch as False
		$is_multi_language = False;

		# If the current file number has a folder
		if (isset($contents["Folder"]["Dictionary"][(string)$i])) {
			# Change the name of the file to add the language
			$file["Name"] = $i." ".$full_language;

			# Get the file in the current language
			$file["Path"] = $contents["Folder"]["Dictionary"][(string)$i]["Path"].$full_language.".png";

			# Change the "Is multi-language" switch to True
			$is_multi_language = True;
		}

		if (
			in_array($file["Extension"], $website["Image formats"]) or
			$is_multi_language == True
		) {
			$class = $website["Data"]["Style"]["background"]["theme"][$tone]." ".$website["Style"]["box_shadow"]["theme"][$tone];

			$class .= " border_radius_5_cent ".$website["Data"]["Style"]["border_4px"]["theme"]["light"];

			# Make the image text and element centered
			$image_string = '<center class="'.$class.'">'."\n";

			if ($i != 1) {
				# Create the "Previous image" button
				$h4 = HTML::Element("h4", $website["Icons"]["arrow_left"]." ".$website["Language texts"]["previous_image"], "", "text_size ".$website["Style"]["text"]["theme"]["dark"], ["new_line" => True, "tab" => "\t\t\t"]);

				$button = HTML::Element("button", $h4, "", "w3-btn ".$website["Style"]["button"]["theme"]["light"], ["new_line" => True]);

				$a = HTML::Element("a", $button, 'href="#memories_image_'.($i - 1).'" style="float: left; text-decoration: none; margin-top: 30px; margin-left: 30px;"', "");

				$previous_image_button = $a;

				# Add the button to the image string
				$image_string .= $previous_image_button;
			}

			if ($i != count($keys) - 1) {
				# Create the "Next image" button
				$h4 = HTML::Element("h4", $website["Language texts"]["next_image"]." ".$website["Icons"]["arrow_right"], "", "text_size ".$website["Style"]["text"]["theme"]["dark"], ["new_line" => True, "tab" => "\t\t\t"]);

				$button = HTML::Element("button", $h4, "", "w3-btn ".$website["Style"]["button"]["theme"]["light"], ["new_line" => True]);

				$a = HTML::Element("a", $button, 'href="#memories_image_'.($i + 1).'" style="float: right; text-decoration: none; margin-top: 30px; margin-right: 30px;"', "");

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

			if (
				$i != 1 and
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
				$text = $HTML -> Element("b", $website["Language texts"]["title, title()"].":")."\n".
				"<br />"."\n";

				# Make the image title
				$title = $key.".".$file["Extension"];

				# Make the title text bold
				$text = $HTML -> Element("span", $text.$title, "", $text_color)."\n";

				# Add the text to the image string
				$image_string .= $text;

				# Add some spaces
				$image_string .= "<br />"."\n".
				"<p></p>"."\n";
			}

			else {
				# Create the image "Number" text
				$text = $HTML -> Element("b", $website["Language texts"]["number, title()"].":")."\n".
				"<br />"."\n";

				# Make the number text bold
				$text = $HTML -> Element("span", $text.$i, "", $text_color)."\n";

				# Add the text to the image string
				$image_string .= $text;

				# Add some spaces
				$image_string .= "<br />"."\n".
				"<p></p>"."\n";
			}

			# Create the image "Date" text
			$image_date = $HTML -> Element("b", $website["Language texts"]["date, title()"].":").
			"<br />"."\n";

			# Get the image date
			if (isset($times[$i - 1])) {
				$image_date .= $times[$i - 1];
			}

			# Make the image date text bold
			$image_date = $HTML -> Element("span", $image_date, "", $text_color)."\n";

			# Add the image date text to the image string
			$image_string .= $image_date;

			# Add some spaces
			$image_string .= "<br />"."\n".
			"<p></p>"."\n";

			# Define the local image folder
			$local_image_folder = $folders["Mega"]["PHP"]["root"];

			# Define the PHP image
			$php_image = str_replace($website["Folders"]["Images"]["root"], "Images/", $file["Path"]);

			# If the "Generate" (website) state is False
			# And the local image folder exists
			# And the PHP image exists
			if (
				$website["States"]["Website"]["Generate"] == False and
				file_exists($local_image_folder) == True and
				file_exists($php_image) == True
			) {
				# Replace the root image folder link with the local one
				$file["Path"] = $php_image;
			}

			# Create the image class
			$class = $website["Data"]["Style"]["img"]["theme"]["light"];

			# Remove the border-radius
			$class = str_replace("border_radius_8_cent", "border_radius_1_cent", $class);

			# Define the attributes
			$attributes = 'style="max-width: 80%;"';

			# Add an alt text
			$attributes .= ' alt="'.$file["Name"].'"';

			# Add a title text
			$attributes .= ' title="'.$file["Name"].'"';

			# Add the image anchor
			$image_string .= '<a name="memories_image_'.$i.'">'."\n";

			# Make the image element
			$image_string .= $HTML -> Image($file["Path"], $class, $attributes);

			# Add some spaces
			$image_string .= "<br />"."\n";

			if ($i != 1) {
				# Create the "Previous image" button
				$h4 = HTML::Element("h4", $website["Icons"]["arrow_left"]." ".$website["Language texts"]["previous_image"], "", "text_size ".$website["Style"]["text"]["theme"]["dark"], ["new_line" => True, "tab" => "\t\t\t"]);

				$button = HTML::Element("button", $h4, "", "w3-btn ".$website["Style"]["button"]["theme"]["light"], ["new_line" => True]);

				$a = HTML::Element("a", $button, 'href="#memories_image_'.($i - 1).'" style="float: left; text-decoration: none; margin-top: 20px; margin-left: 30px;"', "");

				# Add the button to the image string
				$image_string .= $previous_image_button;
			}

			if ($i != count($keys) - 1) {
				# Create the "Next image" button
				$h4 = HTML::Element("h4", $website["Language texts"]["next_image"]." ".$website["Icons"]["arrow_right"], "", "text_size ".$website["Style"]["text"]["theme"]["dark"], ["new_line" => True, "tab" => "\t\t\t"]);

				$button = HTML::Element("button", $h4, "", "w3-btn ".$website["Style"]["button"]["theme"]["light"], ["new_line" => True]);

				$a = HTML::Element("a", $button, 'href="#memories_image_'.($i + 1).'" style="float: right; text-decoration: none; margin-top: 20px; margin-right: 30px;"', "");

				# Add the button to the image string
				$image_string .= $next_image_button.
				"<br />"."\n";
			}

			if (
				$i != 1 or
				$i != count($keys) - 1
			) {
				$image_string .= "<br />"."\n".
				"<p></p>"."\n".
				'<br class="mobile_inline_block" /><br class="mobile_inline_block" />';
			}

			if (
				$i != 1 and
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
		$c++;
	}

	# Add tab to tab templates
	$website["tabs"]["templates"]["memories"] = [
		"name" => $website["Language texts"]["memories, title()"],
		"add" => " ".HTML::Element("span", $tab_content["Number"], "", $website["Style"]["text"]["theme"]["dark"]),
		"text_style" => "text-align: left;",
		"icon" => "images",
		"content" => $tab_content["Content"]
	];
}

else {
	# Define the "Memories" tab to be removed if it does not contain memories
	array_push($website["tabs"]["To remove"], "memories");
}

?>