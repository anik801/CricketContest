<?php
	session_start();
	require 'myConnection.php';
	if(isset($_GET['match'])){
		$matchId=$_GET['match'];
		$userId=$_SESSION['cricket_user_id'];

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
			
			echo "
			<div align='center'>
				<div class='teamDiv'>
					<img src='$team1Logo' id='teamLogoView'><br>$team1Name				
				</div>
				<div class='teamDiv' id='vsTag'>
					<h2>VS</h2>
				</div>
				<div class='teamDiv'>
					<img src='$team2Logo' id='teamLogoView'><br>$team2Name
				</div>

				<div class='afterTeamDiv'>
					Location: $venue<br>
					Schedule: $schedule<br>
				</div>
			</div>
			";

			echo 
			"
			<div id='playersDiv'>
			";
			?>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
			<?php			

			$sql="SELECT * FROM players JOIN user_teams ON user_teams.player_id=players.player_id WHERE match_id='$matchId' AND user_id='$userId' ORDER BY players.team_id";
			$result=mysql_query($sql);

			echo 
			"
			<div>
				<div align='center'>
			";			
			while($row=mysql_fetch_array($result)){	
				$playerId=$row['player_id'];
				$playerName=$row['player_name'];
				$description=$row['player_description'];
				$role=$row['player_role'];
				$image='cricket_admin/uploads/'.$row['player_image'];
				echo 
				"
				<div id='selectPlayerDiv'>
				<table class='table table-bordered table-condensed'>
					<tr>
						<td><img src='$image' id='playerLogoView'></td>
						<td>$playerName<br>$role</td>
					</tr>
				</table>
				</div>
				";
			}
			echo 
			"
				</div>
			</div>

			</div>
			";
			
		}
	}

?>

