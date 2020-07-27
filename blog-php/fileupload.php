<?php  include('config.php'); ?>
<?php  include('includes/public_functions.php'); ?>
<?
        if (isset($_GET['post-slug'])) {
                $post = getPost($_GET['post-slug']);
        }
        $topics = getAllTopics();
?>
<?php include('includes/head_section.php'); ?>
<title> <?php echo $post['title'] ?>Oh Vulnerable Me! | Upload</title>
<link rel="stylesheet" href="/blog-php/static/css/main.css" type="text/css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php session_start(); ?>
<body>
  <div class="container">
        <!-- Navbar -->
                <?php include( ROOT_PATH . '/includes/navbar.php'); ?>
        <!-- // Navbar -->
	<?PHP
  	if(!empty($_FILES['uploaded_file']))
  	{
    		$path = "/var/www/html/blog-php/uploaded_files/";
    		$path = $path . basename( $_FILES['uploaded_file']['name']);
    		if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
      			echo "The file ".  basename( $_FILES['uploaded_file']['name']). 
      			" has been uploaded";
    		} else{
        		echo "There was an error uploading the file, please try again!";
    		}
  	}
	?>

 	<form action = "fileupload.php" method = "post" enctype = "multipart/form-data">
                <!--<label for = "upload">File:</label> -->
                <input type = "file" name = "upload" id = "upload"><br>
                <input type = "submit" name = "submit" value = "Upload">
        </form>

</body>
<!-- // content -->

<?php include( ROOT_PATH . '/includes/footer.php'); ?>

