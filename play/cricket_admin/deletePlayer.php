<?php
	require 'mask.php';
	require 'loginCheck.php';

	if(isset($_GET['id'])){
		$playerId=$_GET['id'];

		$sql="DELETE FROM players WHERE player_id='$playerId'";
		$result=mysql_query($sql);
		if (!$result) {
		    die('Invalid query: ' . mysql_error());
		}else{
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			exit;
		}
		
	}
?>
