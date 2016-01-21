<?php
	$sql="SELECT * FROM teams";
	$result=mysql_query($sql);
	if (!$result) {
	    die('Invalid query: ' . mysql_error());
	}
	while ($row=mysql_fetch_array($result)) {
		$teamName=$row['team_name'];
		$teamId=$row['team_id'];
		echo "<li><a href='#$teamId' onclick='showTeamPlayers($teamId);'>$teamName</a></li>";
	}
?>