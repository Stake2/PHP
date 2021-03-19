<!doctype html>
<html>
<head>
	<?php

	include("config.php");

	$upload_message_file = "Upload Message.php";

	if(isset($_POST['but_upload'])){
		$name = $_FILES['file']['name'];
		$target_dir = "upload/";
		$target_file = $target_dir.basename($_FILES["file"]["name"]);

		// Select file type
		$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

		// Valid file extensions
		$extensions_array = array("jpg","jpeg","png","gif");

		// Check extension
		if(in_array($imageFileType, $extensions_array)){

			// Convert to base64 
			$image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );
			$image = 'data:image/'.$imageFileType.';base64,'.$image_base64;

			// Insert record
			$query = "insert into images(name, image) values('".$name."','".$image."')";
           
			mysqli_query($con, $query) or die(mysqli_error($con));
            
			// Upload file
			move_uploaded_file($_FILES['file']['tmp_name'],'upload/'.$name);

        }

    }
    ?>
<body>

	<form id="send_file" method="post" action="" enctype='multipart/form-data'>
		<input type="file" name="file" />
		<input type="submit" value="Save name" name="but_upload">
	</form>

	<div id="upload_message" style="display:none;"></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
function Show_Message() {
	var message_div = document.getElementById("upload_message");
	var form = document.getElementById("send_file");
	form.remove();

	message_div.innerHTML = "File was uplodaded succesfully!<br />";
	message_div.style.display = "block";

	var element_a = `<br /><form id="send_file" method="post" action="" enctype='multipart/form-data'>
		<input type="file" name="file" />
		<input type="submit" value="Save name" name="but_upload">
	</form>`;
	document.getElementById("upload_message").innerHTML+= element_a;
}

$(document).ready(function() {
	$(document).on('submit', '#send_file', function() {
		Show_Message();
		return false;
	});
});
</script>

</body>
</html>