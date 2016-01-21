<?php
	require 'mask.php';
	require 'loginCheck.php';

	if(isset($_GET['id'])){
		$playerId=$_GET['id'];
		$data=$_GET['data'];
		$team=$_GET['team'];
		$teamId=$_GET['teamId'];

		$sql="UPDATE players set player_status='$data' WHERE player_id='$playerId' ";
		$result=mysql_query($sql);
		if (!$result) {
		    die('Invalid query: ' . mysql_error());
		}else{
			Header("Location: showTeamPlayers.php?id=$teamId&team=$team");
			exit;
		}
	}
?>
