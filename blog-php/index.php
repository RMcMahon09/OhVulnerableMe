<!-- The first include should be config.php -->
<?php require_once('config.php') ?>
<?php require_once( ROOT_PATH . '/includes/public_functions.php') ?>
<?php require_once( ROOT_PATH . '/includes/registration_login.php') ?>

<!-- Retrieve all posts from database  -->
<?php $posts = getPublishedPosts(); ?>

<?php require_once( ROOT_PATH . '/includes/head_section.php') ?>
	<title>Oh Vulnerable Me! | Home </title>

<script type="text/javascript" src="/blog-php/static/js/hello.js"></script>
</head>
<body>
	<!-- container - wraps whole page -->
	<div class="container">
		<!-- navbar -->
		<?php include( ROOT_PATH . '/includes/navbar.php') ?>
		<!-- // navbar -->

		<!-- banner -->
		<?php include( ROOT_PATH . '/includes/banner.php') ?>
		<!-- // banner -->

		<!-- Page content -->
	<!--	<div class="search">
                        <form action="/blog-php/includes/searchbar.php" method="GET">
                                <input type="text" name="query" placeholder="Enter Search.." autocomplete="off" />
                                <input type="submit" value="Search" />
                        </form>
		</div>
		<div class="hello">
		<?php
			$page = $GET['page'];
			include($page.'.php');
		?>
			<?php

			if(!array_key_exists ("name", $_GET) || $_GET['name'] == NULL || $_GET['name'] == '') {

        			$isempty = true;

			} else {

        		echo '<pre>';
        		echo 'Hello ' . $_GET['name'];
        		echo '</pre>';
			}

			?>
			<form name="xss" action=# method="GET">
				<input type="text" name="query" placeholder="What's Your Name?" autocomplete="off" />
				<input type="submit" value="Hello!" />
			</form>
		</div> -->
		<div class="content">
			<h2 class="content-title">Recent Articles</h2>
			<hr>
			<?php foreach ($posts as $post): ?>
				<div class="post" style="margin-left: 0px;">
					<img src="<?php echo BASE_URL . '/static/images/' . $post['image']; ?>" class="post_image" alt="">
        				<!-- Added this if statement... -->
					<?php if (isset($post['topic']['name'])): ?>
						<a 
							href="<?php echo BASE_URL . 'filtered_posts.php?topic=' . $post['topic']['id'] ?>"
							class="btn category">
							<?php echo $post['topic']['name'] ?>
						</a>
					<?php endif ?>

					<a href="single_post.php?post-slug=<?php echo $post['slug']; ?>">
						<div class="post_info">
							<h3><?php echo $post['title'] ?></h3>
							<div class="info">
								<span><?php echo date("F j, Y ", strtotime($post["created_at"])); ?></span>
								<span class="read_more">Read more...</span>
							</div>
						</div>
					</a>
				</div>
			<?php endforeach ?>
		</div>
		<!-- // Page content -->

		<!-- footer -->
		<?php include( ROOT_PATH . '/includes/footer.php') ?>
		<!-- // footer -->
