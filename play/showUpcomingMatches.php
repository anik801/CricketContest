<?php

	$sql="SELECT * from matches WHERE match_status='1'";
	$result=mysql_query($sql);
	if (!$result) {
	    die('Invalid query: ' . mysql_error());
	}else if(mysql_num_rows($result)){
		echo "
		<div id='upcomingMatchTitleDiv' align='center'>
			<h4><b>Upcoming Matches</b></h4>
		</div>
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

			$team1Logo="cricket_admin/uploads/".$row2['team_logo'];
			$team1Name=$row2['team_name'];
			
			$sql2="SELECT * FROM teams WHERE team_id='$team2Id'";
			$result2=mysql_query($sql2);
			$row2=mysql_fetch_array($result2);

			$team2Logo="cricket_admin/uploads/".$row2['team_logo'];
			$team2Name=$row2['team_name'];

			echo "
			<div id='upcomingMatchDiv' align='center'>
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
					";
//////////////////////////////
					$userId=$_SESSION['cricket_user_id'];
					$sql2="SELECT * from user_matches WHERE user_id='$userId' AND match_id='$matchId'";
					$result2=mysql_query($sql2);
					if (!$result2) {
					    die('Invalid query: ' . mysql_error());
					}else if(mysql_num_rows($result2)===0){
						echo "<button id='$matchId' class='btn btn-success' onclick='selectSquad($matchId)'>Create Team</button>";
					}else{
						echo "<a class='btn btn-sm btn-warning' href='#userTeam' role='button' data-toggle='modal' onclick='showUserTeam($matchId);'>Team selected. View squad.</a>";
					}
/////////////////////////////										

					echo"
				</div>
			</div>
			";
		}
	}else{
		echo "There are no matches active currently.";
	}
?>