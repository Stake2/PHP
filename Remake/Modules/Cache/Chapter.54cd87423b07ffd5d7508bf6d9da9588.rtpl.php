<?php if(!class_exists('TPL')){exit;}?><!-- Chapter tab for "<?php echo $chapter_tab['chapter_title']; ?>" chapter -->
<a id="<?php echo $chapter_tab['id']; ?>_anchor" name="<?php echo $chapter_tab['chapter_title']; ?>"></a>
<div id="<?php echo $chapter_tab['id']; ?>" class="tab <?php echo $chapter_tab['class']; ?>" style="height: auto; border-style: solid; border-radius: 50px; padding-bottom: <?php echo $chapter_tab['padding']; ?>; margin-bottom: 2%; display: none;">
	<!-- Chapter title top -->
	<h2 class="text_size">
		<p><br /><b><?php echo $chapter_tab["you_are_reading"]; ?></b><br /><br /><p>
	</h2>

	<?php echo $chapter_tab["comment"]; ?>
	<div class="margin_sides_5_cent">
		<?php echo $website["elements"]["hr_1px_no_margin"]["theme"][$website["style"]["border_color"]]; ?>
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

	<br class="mobile_inline_block" /><br class="mobile_inline_block" />

	<!-- Chapter title bottom -->
	<h3 class="text_size">
		<p><br /><b><?php echo $chapter_tab["you_read"]; ?></b><br /><br /><p>
	</h3>
<?php if( isset($chapter_tab['additional_elements']) ){ ?>
<?php echo $chapter_tab["additional_elements"]; ?>
<?php } ?>
	<br /><br />
</div>