<?php if(!class_exists('TPL')){exit;}?><body class="<?php echo $website['Style']['body']; ?>" <?php echo $website["javascript"]["class_attributes"]["body"]; ?>>
<center>

<!-- Website header -->
<div class="w3-container w3-animate-zoom <?php echo $website['Style']['tab']['theme_dark']; ?>" style="padding: 20px; width: 45%">
	<!-- Website title -->
	<h3 class="text_size <?php echo $website['Style']['text']['theme']['dark']; ?>">
		<b><?php echo $website["Language texts"]["website_title"]; ?>:</b>
	</h3>

	<h3 class="text_size <?php echo $website['Style']['text_highlight']; ?>">
		<b><?php echo $website["Data"]["titles"]["backup"]; ?></b>
	</h3>
	<br />

	<!-- Website language -->
	<h3 class="text_size <?php echo $website['Style']['text']['theme']['dark']; ?>">
		<b><?php echo $website["Language texts"]["language, title()"]; ?>:</b>
	</h3>

	<h3 class="text_size <?php echo $website['Style']['text_highlight']; ?>">
		<b><?php echo $website["full_language"]; ?></b>
	</h3>
	<br />

	<!-- Local website folder -->
	<h3 class="text_size <?php echo $website['Style']['text']['theme']['dark']; ?>">
		<b><?php echo $website["Language texts"]["local_website_folder"]; ?>:</b>
	</h3>

	<h3 class="text_size <?php echo $website['Style']['text_highlight']; ?>">
		<a href="file:///<?php echo $website['Data']['Folders']['Local website']['Language']; ?>" target="_blank">
			<b><?php echo $website["Data"]["Folders"]["Local website"]["Language"]; ?></b>
		</a>
	</h3>
	<br />

	<!-- Remote website folder -->
	<h3 class="text_size <?php echo $website['Style']['text']['theme']['dark']; ?>">
		<b><?php echo $website["Language texts"]["remote_website_folder"]; ?>:</b>
	</h3>

	<h3 class="text_size <?php echo $website['Style']['text_highlight']; ?>">
		<a href="<?php echo $website['Data']['Folders']['Website']['Language']; ?>" target="_blank">
			<b><?php echo $website["Data"]["Folders"]["Website"]["Language"]; ?></b>
		</a>
	</h3>
	<br />

	<!-- Website content state -->
	<h3 class="text_size <?php echo $website['Style']['text']['theme']['dark']; ?>">
		<b><?php echo $website["Language texts"]["content_state"]; ?>:</b>
	</h3>

	<h3 class="text_size <?php echo $website['Style']['text_highlight']; ?>">
		<b><?php echo $website["state"]; ?>.</b>
	</h3>
	<br />
</div>

<?php echo $website["content"]; ?>