<?php
	require 'mask.php';
	require 'loginCheck.php';

	if(isset($_GET['id'])){
		$teamId=$_GET['id'];

		$sql="DELETE FROM players WHERE team_id='$teamId'";
		$result=mysql_query($sql);
		if (!$result) {
		    die('Invalid query: ' . mysql_error());
		}else{
			$sql="DELETE FROM teams WHERE team_id='$teamId'";
			$result=mysql_query($sql);
			if (!$result) {
			    die('Invalid query: ' . mysql_error());
			}else{
				Header("Location: showTeams.php");
				exit;
			}
		}
		
	}
?>
