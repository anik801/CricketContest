<?php
	require 'adminPanel.php';
	$sql="SELECT * FROM matches";
	$result=mysql_query($sql);
	while($row=mysql_fetch_array($result)){
		$schedule=$row['schedule'];
		$venue=$row['venue'];
		$matchType=$row['match_type'];
		$team1Id=$row['first_team'];
		$team2Id=$row['second_team'];			
		$matchId=$row['match_id'];

		$sql2="SELECT * FROM teams WHERE team_id='$team1Id'";
		$result2=mysql_query($sql2);
		$row2=mysql_fetch_array($result2);

		$team1Logo="cricket_admin/uploads/".$row2['team_logo'];
		$team1Name=$row2['team_name'];
		
		$sql2="SELECT * FROM teams WHERE team_id='$team2Id'";
		$result2=mysql_query($sql2);
		$row2=mysql_fetch_array($result2);

		$team2Logo="cricket_admin/uploads/".$row2['team_logo'];
		$team2Name=$row2['team_name'];
		$sql2="SELECT user_accounts.name AS name, user_matches.score AS score FROM user_matches JOIN user_accounts ON user_accounts.id=user_matches.user_id WHERE user_matches.match_id='$matchId' ORDER BY score DESC LIMIT 5";
		$result2=mysql_query($sql2);
		if(mysql_num_rows($result2)){
			echo "
			<div id='matchScoreTitleDiv' align='center'>
				$team1Name VS $team2Name<br>
				Venue: $venue<br>
				Schedule: $schedule<br><hr>
			</div>
			<div id='matchScoreBodyDiv'>
			<table class='table'>
				<tr>
					<td><b>Name</b></td>
					<td><b>Score</b></td>
				</tr>
			";
			
			while($row2=mysql_fetch_array($result2)){
				$name=$row2['name'];
				$score=$row2['score'];
				echo "
				<tr>
					<td>$name</td>
					<td>$score</td>
				</tr>
				";

			}
			echo "
			</table>
			</div>
			";
		}
		
	}
?>