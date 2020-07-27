<html>
	<head>
		<title>Vulnerable Site</title>
		
	</head>

	<body>
		<?php include("content/traversal.php"); ?>
		<div id="wrapper">
			<div id="content">
				<center>
					<p><a href="../index.php">Return Home</a></p>
					<p><a href="page1.php">Page Numero Uno</a></p>
					<p><a href="page2.php">Page Numero Duo</a></p>
					<p><a href="upload.php">Upload A File</a></p>
					<p><a href="command.php">Test Your Connection</a></p>
					<p><a href="/blog-php/">Go To the Blog!</a></p>

					<?php
						if($authenticated)
						{
							if(isset($_GET["name"]))//Vulnerable code; use 'htmlspecialchars()' to make secure
							{
								$name = $_GET["name"];
								echo "<h2>Hello $name!</h2><br>";
							}
						}	
						else
						{
							echo "<b>This is Suppose to be a Secure Site?!</b>";
						}
					?>
				</center>
			</div>
		</div>
	</body>
</html>
