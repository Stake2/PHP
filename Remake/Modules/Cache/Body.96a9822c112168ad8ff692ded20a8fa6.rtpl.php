<?php if(!class_exists('TPL')){exit;}?><body class="<?php echo $website['style']['body']; ?>" <?php echo $website["javascript"]["class_attributes"]["body"]; ?>>
<center>
<?php echo $website["buttons"]; ?>

<!-- Website header -->
<div id="header" class="w3-container w3-animate-zoom <?php echo $website['style']['header']; ?> header_size" style="height: auto; border-radius: 50px; border-style: solid; border-width: 4px!important;">
	<!-- Website title -->
	<h2 class="text_size">
		<p><br /><b><?php echo $website["data"]["titles"]["icon"]; ?></b><br /><br /><p>
	</h2>

	<!-- Website image -->
	<?php echo $website["data"]["image"]["elements"]["theme"]["light"]; ?>
	<br />

	<!-- Website description -->
	<h4 class="text_size">
<?php echo $website["data"]["description"]["header"]; ?>
	</h4>
	<br />
</div>

<?php echo $website["content"]; ?>