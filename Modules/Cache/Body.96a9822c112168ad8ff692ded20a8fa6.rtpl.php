<?php if(!class_exists('TPL')){exit;}?><body class="<?php echo $website['Style']['body']; ?>" <?php echo $website["javascript"]["class_attributes"]["body"]; ?><?php echo $website['Style']['background_image']; ?>>
<center>
<?php echo $website["buttons"]; ?>

<!-- Website header -->
<div id="header" class="w3-animate-zoom <?php echo $website['Data']['Style']['tab']['theme_dark']; ?> <?php echo $website['Data']['Style']['box_shadow_class']; ?> header_size" style="height: auto; border-radius: 50px; border-style: solid; border-width: 4px!important;">
	<!-- Website title -->
	<h2 class="text_size <?php echo $website['Style']['text_highlight']; ?>">
		<p><br /><b><?php echo $website["Data"]["titles"]["icon"]; ?></b><br /><br /><p>
	</h2>

	<!-- Website image -->
	<?php echo $website["Data"]["image"]["elements"]["theme"][$website["Style"]["box_shadow_color"]]; ?>
	<br />

	<!-- Website description -->
	<h3 class="text_size">
<?php echo $website["Data"]["description"]["header"]; ?>
	</h3>
	<br />
</div>

<?php echo $website["content"]; ?>