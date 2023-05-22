<?php if(!class_exists('RainTPL\Classes\Tpl')){exit;}?><!DOCTYPE html>
<head>
	<title><?php echo $title; ?></title>
	<link rel="canonical" href="<?php echo $link; ?>" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="<?php echo $title; ?>" />
	<meta property="og:site_name" content="<?php echo $title; ?>" />
	<meta property="og:url" content="<?php echo $link; ?>" />
	<meta property="og:description" content="<?php echo $description; ?>" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:locale:alternate" content="pt_BR" />
	<meta property="og:locale:alternate" content="pt_PT" />
	<meta name="description" content="<?php echo $description; ?>" />
	<meta name="theme-color" content="#FFFFFF" />
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:website" value="@<?php echo $twitter_author; ?>" />
	<meta name="twitter:site" value="@<?php echo $twitter_author; ?>" />
	<meta name="twitter:creator" content="@<?php echo $twitter_author; ?>" />
	<meta name="twitter:card" content="summary_large_image" />
	<meta name="twitter:url" content="<?php echo $link; ?>" />
	<meta name="revised" content="<?php echo $website["author"]; ?>'s Enterprise TM, <?php echo $data; ?>." />
	<meta name="author" content="<?php echo $website["author"]; ?>" />
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, user-scalable=yes" />
	<meta charset="UTF-8" />

	<!-- CSS files -->
<?php echo $website_css_links; ?>
</head>