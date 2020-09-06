<?php 

#Desert Island Website setter
if (strpos ($host, $params[0].'='.$sitedesertisland) == true) {
	$choosenwebsite = $sitedesertisland;

	#Site title and name definer
	$site = $choosenwebsite;
	$sitename = $choosenwebsite;
	$setsitecssfile = $desert_island_css;

	#Site settings definer
	$deactivateall = false;
	$site_is_prototype = false;
	$site_haves_additional_website_content = false;

	$sitehasnotifications = false; #Defines if site has notifications on
	$sitehascommentstab = true; #Defines if site has a Comments Tab variable
	$sitehidescommentstab = false; #Defines if site has a Comments Tab variable
	$sitehascomments = true; #Defines the site has comments
	$siteshowscomments = true; #Defines if site shows the comments on the Comments Tab
	$sitehasstories = true; #Defines if site has a Stories Tab
	$sitehaschangelog = false; #Defines if site has a changelog tab and file to be read
	$showwriteformtext = false; #Defines if site shows title and story text on the writing chapter
	$showchaptertext = false; #Defines if site shows the chapter text on the writing chapter form
	$sitehidenotifonclickreadtab = false; #Defines if site hides the notification when you click on the "Read story" button
	$siteuseschapteropener = true; #Defines if site uses the Chapter Opener script
    $siteusescitybodygenerator = true; #Defines if the site uses the CityBody generator
	$site_uses_new_comment_and_read_displayer = true;

	$sitestorywrite = false; #Defines if site has a story writing chapter
	$newwritestyle = false; #Defines if the website uses the new writing style for chapters
	$storyhascovers = false; #Defines if site has book covers for the story
	$storyhasreads = true; #Defines if the story website has "reads" number, file and elements
	$storyhasdates = true; #Defines if the story has dates
	$storyhastitles = true; #Defines if the story has titles
	$storyusestatus = true; #Defines if the story uses the story statuses
	$storyhaschaptercomments = true; #Defines if the story has comments on the chapter
	$storyhaswriteform = true; #Defines if the story has writing form to write the story
	$storycontainsreads = false; #Defines if the story has reads on it
	$storycontainscomments = false; #Defines if the story has comments on it

	$site_is_beta = true;
	if ($site_is_beta == false) {
		#Site settings definer
		$deactivateall = true;
		$site_is_prototype = true;
		$site_haves_additional_website_content = true;
	}

	#Site settings setter file includer
	include $settingsparamsfile;

	#Site Tabs array
	$tabs = array('Read', 'Readers', 'Comment', 'Write', 'Stories');

	#Site Tabnames array
	if (in_array($lang, $en_langs)) {
		$tabnames = array('Read story', 'Readers', 'Comment', 'Write', 'Stories', 'Chapters', 'Comments');
	}

	if (in_array($lang, $pt_langs)) {
		$tabnames = array('Ler história', 'Leitores', 'Comentar', 'Escrever', 'Histórias', 'Capítulos', 'Comentários');
	}

	#Number of tabs
	$tabnumb = count($tabs) - 1;
	$tabnumb2 = $tabnumb;

	#Includer of the array of the GenericTabs files
	include $genericcitiesgeneratorfile;
}

?>