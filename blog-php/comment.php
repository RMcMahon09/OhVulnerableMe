<?php
require('Persistence.php');
$comment_post_ID = 1;
$db = new Persistence();
$comments = $db->get_comments($comment_post_ID);
$has_comments = (count($comments) > 0);
?>
<?php  include('config.php'); ?>
<?php  include('includes/public_functions.php'); ?>
<?php
        if (isset($_GET['post-slug'])) {
                $post = getPost($_GET['post-slug']);
        }
        $topics = getAllTopics();
?>
<?php include('includes/head_section.php'); ?>
<link rel="stylesheet" href="/blog-php/static/css/main.css" type="text/css" />
<title> <?php echo $post['title'] ?> Oh Vulnerable Me! | Comment</title>
</head>

<body>

	<div class="container">
        <!-- Navbar -->
                <?php include( ROOT_PATH . '/includes/navbar.php'); ?>
        <!-- // Navbar -->

	<section id="content" class="body">
		<h3>
			<span>Have a question or just want to post something interesting?</span>
		</h3>
		<h4>Use the comment section below to leave a message for all to see and maybe get some questions answered.  Please let us know what you think of the site and leave some resources so others can advance their learning!</h4> 	
	</section>

	<section id="comments" class="body">
	  
	  <header class="commentheader">
		<h2><span><u>Comments</u></span></h2>
	  </header>

    		<ol id="posts-list" class="hfeed<?php echo($has_comments?' has-comments':''); ?>">
      		<li class="no-comments">Be the first to add a comment.</li>
      		<?php
        		foreach ($comments as &$comment) {
          	?>
          		<li><article id="comment_<?php echo($comment['id']); ?>" class="hentry">	
    				<footer class="post-info">
    					<abbr class="published" title="<?php echo($comment['date']); ?>">
    						<?php echo( date('d F Y', strtotime($comment['date']) ) ); ?>
    					</abbr>

    					<address class="vcard author">
    						By <a class="url fn" href="#"><?php echo($comment['comment_author']); ?></a>
    					</address>
    				</footer>

    			<div class="entry-content">
    				<p><?php echo($comment['comment']); ?></p>
    			</div>
    			</article></li>
          	<?php
        		}
      		?>
		</ol>
		
	      <div id="respond">

      		<h3>Leave a Comment</h3>

      		<form action="post_comment.php" method="post" id="commentform">

        		<label for="comment_author" class="required">Your name</label>
        		<input type="text" name="comment_author" id="comment_author" value="" tabindex="1" required="required">
        
        		<label for="email" class="required">Your email</label>
        		<input type="email" name="email" id="email" value="" tabindex="2" required="required">

        		<label for="comment" class="required">Your message</label>
        		<textarea name="comment" id="comment" rows="10" tabindex="4"  required="required"></textarea>

        		<input type="hidden" name="comment_post_ID" value="<?php echo($comment_post_ID); ?>" id="comment_post_ID" />
        		<input name="submit" type="submit" value="Submit comment" />
        
      		</form>
      
   	      </div>
			
	</section>
    	</div>
</body><br><br><br>
<!-- // content -->

<?php include( ROOT_PATH . '/includes/footer.php'); ?>

</html>
