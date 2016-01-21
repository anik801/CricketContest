<?php
	require 'adminPanel.php';

	if(isset($_GET['id'])){
		$matchId=$_GET['id'];
		$sql="SELECT * from matches WHERE match_id='$matchId'";
		$result=mysql_query($sql);
		if (!$result) {
		    die('Invalid query: ' . mysql_error());
		}else{
			$row=mysql_fetch_array($result);
			$schedule=$row['schedule'];
			$venue=$row['venue'];
			$matchType=$row['match_type'];
			$team1Id=$row['first_team'];
			$team2Id=$row['second_team'];			
			$matchStatusValue=$row['match_status'];

			if($matchStatusValue==='1'){
				$matchStatus='Active';
				$data='0';
			}else{
				$matchStatus='Inactive';
				$data='1';
			}

			$sql2="SELECT * FROM teams WHERE team_id='$team1Id'";
			$result2=mysql_query($sql2);
			$row2=mysql_fetch_array($result2);

			$team1Logo="uploads/".$row2['team_logo'];
			$team1Name=$row2['team_name'];
			
			$sql2="SELECT * FROM teams WHERE team_id='$team2Id'";
			$result2=mysql_query($sql2);
			$row2=mysql_fetch_array($result2);

			$team2Logo="uploads/".$row2['team_logo'];
			$team2Name=$row2['team_name'];
			echo "<div id='tableDiv'>";
			echo "
			<table class='table table-striped table-bordered table-condensed'><tbody>
			<tr>
				<td><b>Schedule</b>	</td>
				<td><b>Venue</b></td>
				<td><b>First Team</b></td>
				<td><b>Second Team</b></td>
				<td><b>Match Status</b></td>
			</tr>			

			<tr>
				<td>$schedule</td>
				<td>$venue</td>
				<td>
					<img src='$team1Logo' id='teamLogoView'><br>$team1Name
				</td>
				<td>
					<img src='$team2Logo' id='teamLogoView'><br>$team2Name
				</td>
				<td>$matchStatus</td>
			</tr>
			</table>
			</div>
			";	

			$sql="SELECT players.player_id AS player_id, players.player_name AS player_name, player_scores.score AS score FROM player_scores JOIN players ON players.player_id=player_scores.player_id WHERE match_id='$matchId'";
			$result=mysql_query($sql);
			echo "<div id='tableDiv'>";
			echo 
			"
			<div align='center'>
				<h2><b>List of Players</h2></b><br>
			</div>
			<table class='table table-striped table-bordered table-condensed'><tbody>
				<tr>
					<td><b>Name</b></td>
					<td><b>Score</b></td>
				</tr>
			";
			
			while($row=mysql_fetch_array($result)){	
				$playerId=$row['player_id'];
				$playerName=$row['player_name'];
				$score=$row['score'];
				$fieldName="inputField".$playerId;
				echo 
				"
				<tr>
					<td>$playerName</td>
					<td><input class='form-control' type='text' id='$fieldName' name='$fieldName' value='$score' onblur='updatePlayerScore($playerId,this.value,$matchId)'/></td>
				</tr>
				";
			}
			echo "</div>";
		}

		echo "</table><div align='right'><a class='btn btn-primary' href='showMatches.php' type='button' >Done</a></div>";
	}
	
?>
