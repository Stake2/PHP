<?php if(!class_exists('RainTPL\Classes\Tpl')){exit;}?><!DOCTYPE html>
<head>
	<title><?php echo $title; ?></title>
	<link rel="canonical" href="<?php echo $link; ?>" />
	<link rel="icon" type="image/<?php echo $image_format; ?>" href="<?php echo $image_link; ?>" />
	<link rel="image_src" type="image/<?php echo $image_format; ?>" href="<?php echo $image_link; ?>" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="<?php echo $title; ?>" />
	<meta property="og:site_name" content="<?php echo $title; ?>" />
	<meta property="og:url" content="<?php echo $link; ?>" />
	<meta property="og:image" content="<?php echo $image_link; ?>" />
	<meta property="og:description" content="<?php echo $description; ?>" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:locale:alternate" content="pt_BR" />
	<meta property="og:locale:alternate" content="pt_PT" />
	<meta name="description" content="<?php echo $description; ?>" />
	<meta name="theme-color" content="#916f3b" />
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:website" value="@<?php echo $twitter_author; ?>" />
	<meta name="twitter:site" value="@<?php echo $twitter_author; ?>" />
	<meta name="twitter:creator" content="@<?php echo $twitter_author; ?>" />
	<meta name="twitter:card" content="summary_large_image" />
	<meta name="twitter:url" content="<?php echo $link; ?>" />
	<meta name="revised" content="<?php echo $website_author; ?>'s Enterprise TM, <?php echo $data; ?>." />
	<meta name="author" content="<?php echo $website_author; ?>" />
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, user-scalable=yes" />
	<meta charset="UTF-8" />

	<!-- CSS files -->
<?php echo $website_css_links; ?>

	<!-- JavaScript files -->
<?php echo $website_javascript_links; ?>
<?php echo $include_custom_website_head_content; ?>
</head>