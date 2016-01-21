<?php
	require 'adminPanel.php';

	$sql="SELECT * from matches";
	$result=mysql_query($sql);
	if (!$result) {
	    die('Invalid query: ' . mysql_error());
	}else if(mysql_num_rows($result)){
		echo "<div id='matchesTableDiv'>";
		echo "
		<table class='table table-striped table-bordered table-condensed'><tbody>
			<tr>
				<td><b>Schedule</b></td>
				<td><b>Venue</b></td>
				<td><b>First Team</b></td>
				<td><b>Second Team</b></td>
				<td><b>Match Status</b></td>
				<td colspan='3'><b>Action</b></td>
			</tr>
		";
		while($row=mysql_fetch_array($result)){
			$schedule=$row['schedule'];
			$venue=$row['venue'];
			$matchType=$row['match_type'];
			$team1Id=$row['first_team'];
			$team2Id=$row['second_team'];			
			$matchStatusValue=$row['match_status'];
			$matchId=$row['match_id'];

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

			echo "
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
				<td><a href='changeMatchStatusFunction.php?id=$matchId&data=$data'><button class='btn btn-warning'>Change Match Status</button></a></td>
				<td><button class='btn btn-danger' onclick='deleteMatchButtonClicked($matchId);'>Delete Match</button></a></td>
				<td><a href='showMatchScores.php?id=$matchId'><button class='btn btn-primary'>Scores</button></a></td>
			</tr>
			";
		}
		echo "
		</table>
		</div>
		";
	}else{
		echo "There are no matches in the database.";
	}
?>