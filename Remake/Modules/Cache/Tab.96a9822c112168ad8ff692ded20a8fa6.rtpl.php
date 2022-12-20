<?php if(!class_exists('TPL')){exit;}?><!-- "<?php echo $tab['name']; ?>" tab -->
<a id="<?php echo $tab['id']; ?>_anchor" name="<?php echo $tab['name']; ?>"></a>
<div id="<?php echo $tab['id']; ?>" class="w3-container tab <?php echo $tab['class']; ?>" style="height: auto; border-style: solid; border-radius: 50px; padding-bottom: 1%; margin-bottom: 2%; display: none;">
	<!-- Tab title -->
	<h2 class="text_size">
		<p><br /><b id="<?php echo $tab['id']; ?>_title"><?php echo $tab["title"]; ?></b><br /><br /><p>
	</h2>

	<?php echo $website["elements"]["hr_1px"]["theme"]["light"]; ?>

	<h2 class="text_size margin_sides_5_cent" style="<?php if( isset($tab['text_style']) ){ ?><?php echo $tab["text_style"]; ?><?php } ?>">
		<?php echo $tab["content"]; ?>
	</h2>
</div>