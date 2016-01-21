<?php
	require 'mask.php';
	require 'loginCheck.php';

	if(isset($_GET['id'])){
		$matchId=$_GET['id'];

		$sql="DELETE FROM player_scores WHERE match_id='$matchId'";
		$result=mysql_query($sql);
		if (!$result) {
		    die('Invalid query: ' . mysql_error());
		}else{
			$sql="DELETE FROM matches WHERE match_id='$matchId'";
			$result=mysql_query($sql);
			if (!$result) {
			    die('Invalid query: ' . mysql_error());
			}else{
				Header("Location: showMatches.php");
				exit;
			}
		}
		
	}
?>
