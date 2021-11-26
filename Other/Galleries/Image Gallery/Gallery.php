<?php 

require "config.php";

$upload_folder = 'upload/';

$sql = "SELECT * FROM $table_name";
$result = mysqli_query($con, $sql); // First parameter is just return of "mysqli_connect()" function

?>
<!DOCTYPE html>
<html>
<head></head>
<body>

	<?php 

	while ($row = mysqli_fetch_assoc($result)) { // Important line !!! Check summary get row on array ..
		foreach ($row as $field => $value) { // I you want you can right this line like this: foreach($row as $value) {
			if ($field !== "image" and $field !== "id") {
				echo '<img src="'.$upload_folder.$value.'" />'."<br />";
			}

			#echo "<td>" . $value . "</td>"; // I just did not use "htmlspecialchars()" function. 
		}
	}

	?>

</body>
</html>