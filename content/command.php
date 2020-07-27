<html>
	<head>
		<title>Connection Testing</title>
	</head>

	<body>
		
		<div>
			<h1>Test Your Connection!</h1>
			<center>	
				<div>
					<h2>Enter Any IP Address</h1>
					<form name="ping" action="#" method="post" autocomplete="off">
						<input type="text" name="ip" size="30">
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
</html>
