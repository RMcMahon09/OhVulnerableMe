<?php
	if(isset($_FILES['upload']))
	{
		$uploadDir = '/var/www/uploads/'; //path to store uploads
		$uploadedFile = $uploadDir . basename($_FILES['upload']['name']);
		if(move_uploaded_file($_FILES['upload']['tmp_name'], $uploadedFile))
		{
			echo 'File was uploaded successfully.';
		} else {
			echo 'There was a problem uploading the file.';
		}
		echo '<br><a href = "file.php">Return to Uploader!</a>';
	} else {
		?>
		
		<form action = "file.php" method = "post" enctype = "multipart/form-data">
			<label for = "upload">File:</label>
			<input type = "file" name = "upload" id = "upload"><br>
			<input type = "submit" name = "submit" value = "Upload">
		</form>
	<?php
		}
	?>
