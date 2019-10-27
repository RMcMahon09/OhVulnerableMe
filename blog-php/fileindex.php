<?php  include('config.php'); ?>
<?php  include('includes/public_functions.php'); ?>
<?php
        if (isset($_GET['post-slug'])) {
                $post = getPost($_GET['post-slug']);
        }
        $topics = getAllTopics();
?>
<?php include('includes/head_section.php'); ?>
<title> <?php echo $post['title'] ?>Oh Vulnerable Me! | Upload</title>
<link rel="stylesheet" href="/blog-php/static/css/main.css" type="text/css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<?php session_start(); ?>
<body>
  <div class="container">
        <!-- Navbar -->
                <?php include( ROOT_PATH . '/includes/navbar.php'); ?>
        <!-- // Navbar -->

  <?php
    if (isset($_SESSION['message']) && $_SESSION['message'])
    {
      printf('<b>%s</b>', $_SESSION['message']);
      unset($_SESSION['message']);
    }
  ?>
  <form method="POST" action="upload.php" enctype="multipart/form-data">
    <div>
      <h2>
      <span>Upload a File:</span>
      </h2>
      <input type="file" name="uploadedFile" />
    </div>
    <input type="submit" name="uploadBtn" value="Upload" />
  </form>
  </div>
</body>

<!-- // content -->

<?php include( ROOT_PATH . '/includes/footer.php'); ?>
                                                        
