<?php
	ob_start();//new
	session_start();
	session_destroy();
	header('Location: index.php');
?>