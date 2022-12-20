<?php if(!class_exists('TPL')){exit;}?><!-- Chapter tab for "<?php echo $chapter_tab['chapter_title']; ?>" chapter -->
<a id="<?php echo $chapter_tab['id']; ?>_anchor" name="<?php echo $chapter_tab['chapter_title']; ?>"></a>
<div id="<?php echo $chapter_tab['id']; ?>" class="w3-container tab <?php echo $chapter_tab['class']; ?>" style="height: auto; border-style: solid; border-radius: 50px; padding-bottom: 1%; margin-bottom: 2%; display: none;">
	<!-- Chapter title top -->
	<h2 class="text_size">
		<p><br /><b><?php echo $chapter_tab["you_are_reading"]; ?></b><br /><br /><p>
	</h2>

	<?php echo $chapter_tab["comment"]; ?>
	<div class="margin_sides_5_cent">
		<?php echo $website["elements"]["hr_1px_no_margin"]["theme"]["light"]; ?>
		<?php echo $chapter_tab["top_button"]; ?>

		<br /><br /><br />

		<?php if( isset($chapter_tab['chapter_cover']) ){ ?>
<?php echo $chapter_tab["chapter_cover"]; ?>
<?php } ?>
		<!-- Chapter text -->
		<h4 class="text_size unselectable<?php echo $chapter_tab['chapter_text_color']; ?>" style="text-align: left;">
		<?php echo $chapter_tab["chapter_text"]; ?>
		</h4>
		<?php echo $chapter_tab["bottom_button"]; ?>

		<br /><br /><br />

	</div>

	<!-- Chapter title bottom -->
	<h3 class="text_size">
		<p><br /><b><?php echo $chapter_tab["you_read"]; ?></b><br /><br /><p>
	</h3>
<?php if( isset($chapter_tab['additional_elements']) ){ ?>
<?php echo $chapter_tab["additional_elements"]; ?>
<?php } ?>
</div>