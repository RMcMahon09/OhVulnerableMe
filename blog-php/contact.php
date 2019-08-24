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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
  </head>
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
	<section id="content" class="body">

          <article class="hentry">
                        <header>
                                <h2 class="entry-title"><a href="#" rel="bookmark" title="Permalink to this Building a Pusher-powered Real-Time Commenting System">Building a Pusher-powered Real-Time Commenting System</a></h2>
                        </header>

                        <footer class="post-info">
                                <abbr class="published" title="2012-02-10T14:07:00-07:00">
                                        10th February 2012
                                </abbr>

                                <address class="vcard author">
                                        By <a class="url fn" href="#">Phil Leggetter</a>
                                </address>
                        </footer>

                        <div class="entry-content">
                                <p>The web has become increasingly interactive over the years. This trend is set to continue with the next generation of applications driven by the <strong>real-time web</strong>. Adding real-time functionality to an application can result in a more interactive and engaging user experience. However, setting up and maintaining the server-side realtime components can be an unwanted distraction. But don't worry, there is a solution.</p>
                        </div>
                </article>

        </section>
	
	<section id="comments" class="body">

          <header>
                        <h2>Comments</h2>
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

		<div>
			<h2>
			<span>Have a Question?!</span>
			</h2>
  
    			<div class="info">
      			<label for="example">Enter Text</label>
      			<input id="example" type="text"
             			name="Ntext" size="20">
      			<input id="sent" type="submit"  
             			value="Send"> 
  			</div>
    			<p id="para"></p>
		</div>
	</div>
  </body>
  <script>
    window.onclick = function(e)
    {   var id =  e.target.id;   
     if (id === 'sent')  
     { var txt = document.getElementById('example').value    
       $( "#para" ).empty().append( txt );
     }
    }
  </script>

<!-- // content -->

<?php include( ROOT_PATH . '/includes/footer.php'); ?>

