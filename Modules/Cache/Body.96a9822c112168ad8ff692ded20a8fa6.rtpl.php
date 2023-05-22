<?php if(!class_exists('TPL')){exit;}?><body class="<?php echo $website['style']['body']; ?>" <?php echo $website["javascript"]["class_attributes"]["body"]; ?>>
<center>
<?php echo $website["buttons"]; ?>

<!-- Website header -->
<div id="header" class="w3-animate-zoom <?php echo $website['style']['tab']['theme_dark']; ?> <?php echo $website['style']['box_shadow_class']; ?> header_size" style="height: auto; border-radius: 50px; border-style: solid; border-width: 4px!important;">
	<!-- Website title -->
	<h2 class="text_size <?php echo $website['style']['text_highlight']; ?>">
		<p><br /><b><?php echo $website["data"]["titles"]["icon"]; ?></b><br /><br /><p>
	</h2>

	<!-- Website image -->
	<?php echo $website["data"]["image"]["elements"]["theme"][$website["style"]["box_shadow_color"]]; ?>
	<br />

	<!-- Website description -->
	<h3 class="text_size">
<?php echo $website["data"]["description"]["header"]; ?>
	</h3>
	<br />
</div>

<?php echo $website["content"]; ?>