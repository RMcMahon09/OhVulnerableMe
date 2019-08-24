<?php

if(!array_key_exists ("name", $_GET) || $_GET['name'] == NULL || $_GET['name'] == '') {
	
	$isempty = true;

} else {
	
	echo '<pre>';
	echo 'Hello ' . $_GET['name'];
	echo '</pre>';
}

?>
