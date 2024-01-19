<?php if(!class_exists('TPL')){exit;}?><!DOCTYPE html>
<head>
	<!-- Website title -->
	<title><?php echo $website["Data"]["titles"]["language"]; ?></title>

	<!-- Website links -->
	<link rel="canonical" href="<?php echo $website['Data']['links']['language']; ?>" />
	<link rel="icon" type="image/<?php echo $website['Data']['image']['format']; ?>" href="<?php echo $website['Data']['image']['link']; ?>" />
	<link rel="image_src" type="image/<?php echo $website['Data']['image']['format']; ?>" href="<?php echo $website['Data']['image']['link']; ?>" />

	<!-- Website meta tags -->
	<meta name="title" content="<?php echo $website['Meta title']; ?>" />
	<meta name="description" content="<?php echo $website['Data']['description']['html']; ?>" />
	<meta name="meta_language" content="<?php echo $website['full_language']; ?>" />
	<meta name="theme-color" content="<?php echo $website['Data']['color']; ?>" />

	<!-- Website og meta tags -->
	<meta property="og:type" content="website" />
	<meta property="og:title" content="<?php echo $website['Meta title']; ?>" />
	<meta property="og:site_name" content="<?php echo $website['Meta title']; ?>" />
	<meta property="og:url" content="<?php echo $website['Data']['links']['language']; ?>" />
	<meta property="og:image" type="image/<?php echo $website['Data']['image']['format']; ?>" content="<?php echo $website['Data']['image']['link']; ?>" />
	<meta property="og:description" content="<?php echo $website['Data']['description']['html']; ?>" />
	<meta property="og:locale" content="<?php echo $website['locale']; ?>" />
<?php if( isset($website['locale_alternate']) ){ ?>	<meta property="og:locale:alternative" content="<?php echo $website['locale_alternate']; ?>" />
<?php } ?>

	<!-- Twitter meta tags -->
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:title" content="<?php echo $website['Meta title']; ?>" />
	<meta name="twitter:description" content="<?php echo $website['Data']['description']['html']; ?>" />
	<meta name="twitter:website" value="@<?php echo $website['Twitter author']; ?>_" />
	<meta name="twitter:site" value="@<?php echo $website['Twitter author']; ?>_" />
	<meta name="twitter:creator" content="@<?php echo $website['Twitter author']; ?>_" />
	<meta name="twitter:url" content="<?php echo $website['Data']['links']['language']; ?>" />
	<meta name="twitter:image" type="image/<?php echo $website['Data']['image']['format']; ?>" content="<?php echo $website['Data']['image']['link']; ?>" />

	<!-- Author related meta tags -->
	<meta name="revised" content="<?php echo $website['Twitter author']; ?>'s Enterprise TM, <?php echo $website['Date'][$website['Language texts']['date_format']]; ?>." />
	<meta name="author" content="<?php echo $website['author']; ?>" />

	<!-- Viewport and charset -->
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, user-scalable=yes" />
	<meta charset="UTF-8" />

	<!-- CSS files -->
<?php echo $website["css"]["links"]; ?>

	<!-- Define website box shadow -->
	<style>
	body {
		--shadow-color: <?php if( isset($website['Data']['color']) ){ ?><?php echo $website["Data"]["color"]; ?><?php }else{ ?>#dc96e8<?php } ?>60;
		--spread-container: 10px;
		--spread-btn: 0.5px;
	}

	.w3-btn, .w3-container, .modal, .modal-content, .w3-input {
		box-shadow: 0 -8px 20px var(--spread-btn) var(--shadow-color),
		0 8px 20px var(--spread-btn) var(--shadow-color),
		0 6px 20px var(--spread-btn) var(--shadow-color),
		0 -6px 20px var(--spread-btn) var(--shadow-color);
	}
	
	.video-container {
		position: relative;
		width: 50vw;
		height: calc(50vw/1.77);
	}

	.video-container iframe {
		position: absolute;
		top: 0;
		left: 0;
		width: 50vw;
		height: calc(50vw/1.77);
	}
	</style>

	<!-- JavaScript files -->
<?php echo $website["javascript"]["links"]; ?>
	<?php if( $parse == '/generate' ){ ?>


	<script>
		Check_Language()
	</script><?php } ?>

</head>

