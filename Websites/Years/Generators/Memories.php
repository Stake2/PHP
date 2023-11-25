<?php 

# Memories

$tab_content = [
	"Number" => 0,
	"Content" => ""
];

# Define the local and remote image folders
$local_folder = $website["data"]["folders"]["website"]["images"]["Local"]["Memories"]["root"];
$remote_folder = $website["data"]["folders"]["website"]["images"]["Remote"]["Memories"]["root"];

# List the folder contents
$contents = $Folder -> Contents($local_folder, $remote_folder);

# List the file keys
$keys = array_keys($contents["File"]["Dictionary"]);

# Define the dates file
$file = $local_folder."Dates.txt";

# List the file dates
$times = $File -> Contents($file)["lines"];

$add_image_title = False;

# Tone
$tone = "dark";

# Iterate through the file keys
$i = 0;

foreach ($keys as $key) {
	$key = (string)$key;

	# Get the file dictionary
	$file = $contents["File"]["Dictionary"][$key];

	if (in_array($file["Extension"], $website["Image formats"])) {
		$class = $website["data"]["style"]["background"]["theme"][$tone]." ".$website["style"]["box_shadow"]["theme"][$tone];

		$class .= " border_4px border_radius_5_cent";

		# Make the image text and element centered
		$image_string = '<center class="'.$class.'">'."\n";

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

			# Get the image number
			$number = (string)$i + 1;

			# Add the number text and number to the image string
			$image_string .= $text.$number;

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
		if (isset($times[$i])) {
			$image_date .= $times[$i];
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
		$attributes = 'style="max-width: 100vw;"';

		# Add an alt text
		$attributes .= ' alt="'.$file["Name"].'"';

		# Add a title text
		$attributes .= ' title="'.$file["Name"].'"';

		# Make the image element
		$image_string .= $HTML -> Image($file["Path"], $class, $attributes);

		# Add some spaces
		$image_string .= "<br />"."\n".
		"<br />"."\n";

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