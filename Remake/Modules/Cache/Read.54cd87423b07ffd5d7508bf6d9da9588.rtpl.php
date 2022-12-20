<?php if(!class_exists('TPL')){exit;}?><!-- Chapter read modal for chapters -->
<a id="chapter_read_anchor" name="chapter_read"></a>
<div id="chapter_read" class="modal tab" style="">
	<div class="modal-content <?php echo $website['style']['tab']['black']; ?> <?php echo $website['style']['text']['theme']['normal']; ?>" style="width: 50%; border-radius: 50px; padding-bottom: 6%;">
		<!-- Hide modal button -->
		<button class="w3-btn <?php echo $website['style']['button']['black']; ?>" onclick="Hide_Modal('chapter_read');" style="float: right; padding: 2px 14px 3px 15px !important;">
			<h4 class="text_size" style="font-weight: bold;">
				X
			</h4>
		</button>

		<!-- I read the chapter text -->
		<h3 class="text_size" style="font-weight: bold;">
			<?php echo $website["language_texts"]["i_read_the_chapter"]; ?>:<br />
			<span id="chapter_read_title"></span>
		</h3>
		<br />

		<!-- Read form -->
		<form method="POST" name="<?php echo $website['title']; ?>_Read">
			<input type="hidden" name="form-name" value="<?php echo $website['title']; ?>_Read">
	
			<!-- My name input -->
			<h3 class="text_size margin_top_bottom_2_cent" style="font-weight: bold;">
				<?php echo $website["language_texts"]["my_name"]; ?>:<br />
			</h3>
			<input type="text" name="name" class="w3-input text_size <?php echo $website['style']['button']['black']; ?>" style="width: 50%; border-radius: 50px;">

			<!-- Hidden chapter title input -->
			<input id="chapter_read_value" type="text" name="chapter" value="" class="w3-input <?php echo $website['style']['button']['black']; ?>" style="display: none; border-radius: 50px; text-align: center;">

			<!-- Submit form button -->
			<button type="submit" class="w3-btn <?php echo $website['style']['button']['black']; ?>" style="float: right; border-radius: 50px;">
				<h2>
					<b><?php echo $website["language_texts"]["send, title()"]; ?>: <?php echo $website["icons"]["paper_plane"]; ?></b>
				</h2>
			</button>
		</form>
	</div>
</div>