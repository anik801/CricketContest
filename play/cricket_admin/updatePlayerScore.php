<?php
ob_start();
session_start();
if(isset($_GET['id'])){

	require 'myConnection.php';	

	$playerId = $_GET['id'];
	$score = $_GET['value'];
	$matchId = $_GET['match'];
	//Update player score
	$sql="UPDATE player_scores SET score='$score' WHERE (player_id='$playerId' AND match_id='$matchId')";
	$result=mysql_query($sql);
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}

	//Update user scores
	$sql="SELECT user_id FROM user_matches WHERE match_id='$matchId'";
	$result=mysql_query($sql);
	while($row=mysql_fetch_array($result)){
		$userId=$row['user_id'];
		$sql2="SELECT SUM(score) AS score FROM player_scores JOIN user_teams ON user_teams.player_id = player_scores.player_id AND user_teams.match_id = player_scores.match_id WHERE user_id =  '$userId' AND user_teams.match_id = '$matchId' ";
		$result2=mysql_query($sql2);
		$row2=mysql_fetch_array($result2);
		$sum=$row2['score'];
		
		$sql3="UPDATE user_matches SET score='$sum' WHERE (user_id='$userId' AND match_id='$matchId')";
		$result3=mysql_query($sql3);	

	}
}

?>