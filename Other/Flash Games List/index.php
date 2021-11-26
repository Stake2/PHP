<!DOCTYPE html>
<head>
<title>Flash Games List</title>
<meta property="og:type" content="website" />
<meta property="og:title" content="Games" />
<meta property="og:site_name" content="Games" />
<meta property="og:locale" content="en_US" />
<meta property="og:locale:alternate" content="pt_BR" />
<meta property="og:locale:alternate" content="pt_PT" />
<meta name="description" content="Website to list games to play, made by stake2." />
<meta name="twitter:card" content="summary" />
<meta name="twitter:website" value="@The_Snakes90" />
<meta name="twitter:site" value="@The_Snakes90" />
<meta name="twitter:creator" content="@The_Snakes90" />
<meta name="revised" content="Stake's Enterprise TM, 04/08/2021" />
<meta name="author" content="Stake Ferreira" />
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, user-scalable=yes" />
<meta charset="UTF-8" />

<!-- CSS files -->
<link rel="stylesheet" type="text/css" href="https://www.w3schools.com/lib/w3.css" />
<link rel="stylesheet" type="text/css" href="https://thestake2.netlify.app/CSS/Styler CSS/W3.css" />
<link rel="stylesheet" type="text/css" href="https://thestake2.netlify.app/CSS/Styler CSS/Main_CSS.css" />
<link rel="stylesheet" type="text/css" href="https://thestake2.netlify.app/CSS/Styler CSS/Colors.css" />

<style>
:root {
	--black-background: url("https://thestake2.netlify.app/Images/Backgrounds/Black%20Background.png");
	--black-background-with-particles: url("https://thestake2.netlify.app/Images/Backgrounds/Black%20Background%20With%20Particles.png");
}

body { 
    background-image: var(--black-background-with-particles); 
    background-color: #D3D3D3;
    margin: 0;
    padding: 0;
}

h1, h2, h3, h4, h5, h6 {
	color: white;
}
</style>

<!-- JavaScript files -->
<script src="https://kit.fontawesome.com/df0c191291.js" crossorigin="anonymous"></script>
<body>
<center>
<div class="mobileHide"><br /><br /><br /></div>
<div class="background_black border_color_blue border_4px" style="margin-left:5%;margin-right:5%;border-radius: 50px;">

<!-- Website header -->
<div class="w3-animate-zoom">

<!-- Website computer title -->
<h2 class="w3-center text_blue w3-animate-zoom mobileHide">
<p><br /><b>
Flash Games List:
<i class="fas fa-gamecontroller"></i></b><br /><br /><p>
</h2>
</div>

<hr class="border_color_blue border_1px" style="margin-left:3%;margin-right:3%;" />
<h2 class="w3-center text_blue w3-animate-zoom mobileHide">

<?php 

function Open_File($file, $mode = Null) {
	if ($mode == Null) {
		$mode = "r";
	}

	if (file_exists($file) == True) {
		return $file = fopen($file, $mode, 'UTF-8');
	}

	else {
		return null;
	}
}

function Remove_Text_From_String($item, $text_to_replace = Null) {
	$line_replace_array = array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF");

	if ($text_to_replace == Null) {
		$text_to_replace = $line_replace_array;
	}

	if (is_string($item) or is_array($item)) {
		return str_replace($text_to_replace, "", $item);
	}
}

function Read_Lines($file) {
	$file_read = Open_File($file);

	if ($file_read != Null) {
		$array = explode("\n", fread($file_read, filesize($file)));
		$array = Remove_Text_From_String($array);

		return $array;
	}

	if ($file_read == Null) {
		return Null;
	}
}

$game_names_file = "./Game Names.txt";
$game_links_file = "./Game Links.txt";

$game_names = Read_Lines($game_names_file);
$game_links = Read_Lines($game_links_file);

$i = 1;
$link_number = 0;
foreach ($game_names as $game) {
	echo '<b>'.$i.' - '.'<a class="w3-center text_blue w3-animate-zoom" target="_blank" href="'.$game_links[$link_number].'">'.$game."</a>"."<br />"."\n";

	$i++;
	$link_number++;
}

?>

</b>
</h2>

<br />
</div>

</body>
</center>
</html>