<?php
ob_start();
session_start();
if(isset($_GET['id'])){

	require 'myConnection.php';	

	$playerId = $_GET['id'];
	$value = $_GET['value'];
	
	$sql="UPDATE players SET player_role='$value' WHERE (player_id='$playerId')";
	$result=mysql_query($sql);
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
}

?>