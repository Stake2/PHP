<?php if(!class_exists('TPL')){exit;}?><body class="<?php echo $website['style']['body']; ?>" <?php echo $website["javascript"]["class_attributes"]["body"]; ?>>
<center>

<!-- Website header -->
<div class="w3-container w3-animate-zoom <?php echo $website['style']['tab']['theme_dark']; ?>" style="padding: 20px; width: 45%">
	<!-- Website title -->
	<h3 class="text_size <?php echo $website['style']['text']['theme']['dark']; ?>">
		<b><?php echo $website["language_texts"]["website_title"]; ?>:</b>
	</h3>

	<h3 class="text_size <?php echo $website['style']['text_highlight']; ?>">
		<b><?php echo $website["data"]["titles"]["backup"]; ?></b>
	</h3>
	<br />

	<!-- Website language -->
	<h3 class="text_size <?php echo $website['style']['text']['theme']['dark']; ?>">
		<b><?php echo $website["language_texts"]["language, title()"]; ?>:</b>
	</h3>

	<h3 class="text_size <?php echo $website['style']['text_highlight']; ?>">
		<b><?php echo $website["full_language"]; ?></b>
	</h3>
	<br />

	<!-- Local website folder -->
	<h3 class="text_size <?php echo $website['style']['text']['theme']['dark']; ?>">
		<b><?php echo $website["language_texts"]["local_website_folder"]; ?>:</b>
	</h3>

	<h3 class="text_size <?php echo $website['style']['text_highlight']; ?>">
		<a href="file:///<?php echo $website['data']['folders']['local_website']['language']; ?>" target="_blank">
			<b><?php echo $website["data"]["folders"]["local_website"]["language"]; ?></b>
		</a>
	</h3>
	<br />

	<!-- Remote website folder -->
	<h3 class="text_size <?php echo $website['style']['text']['theme']['dark']; ?>">
		<b><?php echo $website["language_texts"]["remote_website_folder"]; ?>:</b>
	</h3>

	<h3 class="text_size <?php echo $website['style']['text_highlight']; ?>">
		<a href="<?php echo $website['data']['folders']['website']['language']; ?>" target="_blank">
			<b><?php echo $website["data"]["folders"]["website"]["language"]; ?></b>
		</a>
	</h3>
	<br />

	<!-- Website content state -->
	<h3 class="text_size <?php echo $website['style']['text']['theme']['dark']; ?>">
		<b><?php echo $website["language_texts"]["content_state"]; ?>:</b>
	</h3>

	<h3 class="text_size <?php echo $website['style']['text_highlight']; ?>">
		<b><?php echo $website["state"]; ?>.</b>
	</h3>
	<br />
</div>