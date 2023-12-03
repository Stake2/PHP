<?php 

# Memories

$tab_content = [
	"Number" => 0,
	"Content" => ""
];

# Define the local and remote image folders
$local_folder = $website["data"]["folders"]["website"]["Images"]["Local"]["Memories"]["root"];
$remote_folder = $website["data"]["folders"]["website"]["Images"]["Remote"]["Memories"]["root"];

# List the folder contents
$contents = $Folder -> Contents($local_folder, $remote_folder);

# Define the dates file
$file = $local_folder."Dates.txt";

# List the file dates
$times = $File -> Contents($file)["lines"];

$add_image_title = False;

# Tone
$tone = "dark";

# Iterate through the file keys
$i = 0;

# List the file keys
$keys = array_keys($contents["File"]["Dictionary"]);

$i = 1;

foreach ($keys as $key) {
	$key = (string)$key;

	# Get the file dictionary
	$file = $contents["File"]["Dictionary"][$key];

	if (in_array($file["Extension"], $website["Image formats"])) {
		$class = $website["data"]["style"]["background"]["theme"][$tone]." ".$website["style"]["box_shadow"]["theme"][$tone];

		$class .= " border_4px border_radius_5_cent";

		# Make the image text and element centered
		$image_string = '<center class="'.$class.'">'."\n";

		if ($i != 1) {
			# Create the "Previous image" button
			$h4 = HTML::Element("h4", $website["icons"]["arrow_left"]." ".$website["language_texts"]["previous_image"], "", "text_size ".$website["style"]["text"]["theme"]["dark"], ["new_line" => True, "tab" => "\t\t\t"]);

			$button = HTML::Element("button", $h4, "", "w3-btn ".$website["style"]["button"]["theme"]["light"], ["new_line" => True]);

			$a = HTML::Element("a", $button, 'href="#memories_image_'.($i - 1).'" style="float: left; text-decoration: none; margin-top: 30px; margin-left: 30px;"', "");

			$previous_image_button = $a;

			# Add the button to the image string
			$image_string .= $previous_image_button;
		}


		if ($i != count($keys) - 1) {
			# Create the "Next image" button
			$h4 = HTML::Element("h4", $website["language_texts"]["next_image"]." ".$website["icons"]["arrow_right"], "", "text_size ".$website["style"]["text"]["theme"]["dark"], ["new_line" => True, "tab" => "\t\t\t"]);

			$button = HTML::Element("button", $h4, "", "w3-btn ".$website["style"]["button"]["theme"]["light"], ["new_line" => True]);

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

		# Add some spaces
		$image_string .= "<p></p>"."\n";

		if ($add_image_title == True) {
			# Create the image "Title" text
			$text = $website["language_texts"]["title, title()"].":"."\n".
			"<br />"."\n";

			# Make the title text bold
			$text = $HTML -> Element("b", $text)."\n";

			# Make the image title
			$title = $key.".".$file["Extension"];

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

		# Create the image "Date" text
		$image_date = $website["language_texts"]["date, title()"].":".
		"<br />"."\n";

		# Make the image date text bold
		$image_date = $HTML -> Element("b", $image_date)."\n";

		# Get the image date
		if (isset($times[$i - 1])) {
			$image_date .= $times[$i - 1];
		}

		# Add the image date text to the image string
		$image_string .= $image_date;

		# Add some spaces
		$image_string .= "<br />"."\n".
		"<p></p>"."\n";

		# Temporary:
		# Replace remote folder with the local PHP images folder
		# To test if the images appear correctly
		#$php_folder = "/Images/";

		#$file["Path"] = str_replace($website["folders"]["images"]["root"], $php_folder, $file["Path"]);

		# Create the image class
		$class = $website["data"]["style"]["img"]["theme"]["light"];

		# Remove the border-radius
		$class = str_replace("border_radius_8_cent", "border_radius_1_cent", $class);

		# Define the attributes
		$attributes = 'style="max-width: 100%;"';

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
			$h4 = HTML::Element("h4", $website["icons"]["arrow_left"]." ".$website["language_texts"]["previous_image"], "", "text_size ".$website["style"]["text"]["theme"]["dark"], ["new_line" => True, "tab" => "\t\t\t"]);

			$button = HTML::Element("button", $h4, "", "w3-btn ".$website["style"]["button"]["theme"]["light"], ["new_line" => True]);

			$a = HTML::Element("a", $button, 'href="#memories_image_'.($i - 1).'" style="float: left; text-decoration: none; margin-top: 20px; margin-left: 30px;"', "");

			# Add the button to the image string
			$image_string .= $previous_image_button;
		}

		if ($i != count($keys) - 1) {
			# Create the "Next image" button
			$h4 = HTML::Element("h4", $website["language_texts"]["next_image"]." ".$website["icons"]["arrow_right"], "", "text_size ".$website["style"]["text"]["theme"]["dark"], ["new_line" => True, "tab" => "\t\t\t"]);

			$button = HTML::Element("button", $h4, "", "w3-btn ".$website["style"]["button"]["theme"]["light"], ["new_line" => True]);

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
		if ($key != array_reverse($keys)[1]) {
			$image_string .= "<br />"."\n".
			"<br />"."\n";
		}

		# Add the image element to the tab content string
		$tab_content["Content"] .= $image_string;

		# Add to the tab content number
		$tab_content["Number"]++;
	}

	$i++;
}

# Add tab to tab templates
$website["tabs"]["templates"]["memories"] = [
	"name" => $website["language_texts"]["memories, title()"],
	"add" => " ".HTML::Element("span", $tab_content["Number"], "", $website["style"]["text"]["theme"]["dark"]),
	"text_style" => "text-align: left;",
	"icon" => "images",
	"content" => $tab_content["Content"]
];

?>