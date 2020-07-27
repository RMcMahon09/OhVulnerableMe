<?php
    if (isset($_POST['Upload'])) {

            $target_path = "/var/www/html/blog-php/file_upload/";
            $target_path = $target_path . basename( $_FILES['uploaded']['name']);

            if(!move_uploaded_file($_FILES['uploaded']['tmp_name'], $target_path)) {
                
                echo '<pre>';
                echo 'Your image was not uploaded.';
                echo '</pre>';
                
              } else {
            
                echo '<pre>';
                echo $target_path . ' succesfully uploaded!';
                echo '</pre>';
                
            }

        }
?>

		<form enctype="multipart/form-data" action="uploads.php" method="POST" />
			<input type="hidden" name="MAX_FILE_SIZE" value="100000" />
			Choose a file to upload:
			<br />
			<input name="uploaded" type="file" /><br />
			<br />
			<input type="submit" name="Upload" value="Upload" />
		</form>
