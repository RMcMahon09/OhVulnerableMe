<?php  include('config.php'); ?>
<?php  include('includes/public_functions.php'); ?>
<?php
        if (isset($_GET['post-slug'])) {
                $post = getPost($_GET['post-slug']);
        }
        $topics = getAllTopics();
?>
<?php include('includes/head_section.php'); ?>
<title> <?php echo $post['title'] ?> Oh Vulnerable Me! | Ping</title>
</head>

	<body>
	<div class="container">
        <!-- Navbar -->
                <?php include( ROOT_PATH . '/includes/navbar.php'); ?>
        <!-- // Navbar -->
		
		<div>
		<center>
			<h1>Test Your Connection!</h1><br><br>	
				<div>
					<h2>Enter Any IP Address</h1>
					<form name="ping" action="#" method="post" autocomplete="off">
						<input type="text" name="ip" size="30"> <!-- Make the size shorter if you only want an IP -->
						<input type="submit" value="submit" name="submit">
					</form>


			<?php

				if(isset( $_POST[ 'submit' ] ) ) 
				{
					$target = $_REQUEST[ 'ip' ];
		
					//Blacklist
					$substitutions = array(
						'&&' => '',
						';' => '',
					);
		
					$target = str_replace( array_keys( $substitutions ), $substitutions, $target );
		
					//Determine OS 
					if (stristr(php_uname('s'), 'Windows NT'))
					{
						$cmd = shell_exec( 'ping ' . $target );
						echo '<pre>'.$cmd.'</pre>';
					} else
						{
							$cmd = shell_exec( 'ping -c 3 ' . $target );
							echo '<pre>'.$cmd.'</pre>';
						}
				}
			?>

		</center>
		</div>
	</body>

	<!-- // content -->

<?php include( ROOT_PATH . '/includes/footer.php'); ?>
</html>
