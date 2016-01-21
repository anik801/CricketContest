<?php
	session_start();
	require 'myConnection.php';
	if(isset($_GET['player'])){
		$playerId=$_GET['player'];
		$matchId=$_GET['match'];
		$userId=$_SESSION['cricket_user_id'];

		$sql="SELECT * from user_teams WHERE user_id='$userId' AND match_id='$matchId' AND player_id='$playerId'";
		$result=mysql_query($sql);
		if (!$result) {
		    die('Invalid query: ' . mysql_error());
		}else if(mysql_num_rows($result)===0){
			$sql="INSERT INTO user_teams (user_id,match_id,player_id) VALUES ('$userId','$matchId','$playerId')";
			$result=mysql_query($sql);
			if (!$result) {
			    die('Invalid query: ' . mysql_error());
			}	
		}

		$sql="SELECT * from user_matches WHERE user_id='$userId' AND match_id='$matchId'";
		$result=mysql_query($sql);
		if (!$result) {
		    die('Invalid query: ' . mysql_error());
		}else if(mysql_num_rows($result)===0){
			$sql="INSERT INTO user_matches (user_id,match_id) VALUES ('$userId','$matchId')";
			$result=mysql_query($sql);
			if (!$result) {
			    die('Invalid query: ' . mysql_error());
			}	
		}	
	}
?>