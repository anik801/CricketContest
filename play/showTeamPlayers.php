<?php
	session_start();
	require 'myConnection.php';
	if(isset($_GET['id'])){
		$team1Id=$_GET['id'];		
		$sql2="SELECT * FROM teams WHERE team_id='$team1Id'";
		$result2=mysql_query($sql2);
		$row2=mysql_fetch_array($result2);

		$team1Logo="cricket_admin/uploads/".$row2['team_logo'];
		$team1Name=$row2['team_name'];

		$sql="SELECT * FROM players WHERE team_id='$team1Id'";
		$result=mysql_query($sql);

		echo 
			"
			<div align='center'>
				<div id='teamTitle'>
					$team1Name
				</div>
				<hr>
			";			
			while($row=mysql_fetch_array($result)){	
				$playerId=$row['player_id'];
				$playerName=$row['player_name'];
				$description=$row['player_description'];
				$role=$row['player_role'];
				$image='cricket_admin/uploads/'.$row['player_image'];
				$link=$row['external_link'];
				echo 
				"
				<div id='selectPlayerDiv'>
				<table class='table table-bordered table-condensed'>					
					<tr'>					
						<td><a id='teamPlayersRow' href='$link'><img src='$image' id='playerLogoView'></a></td>
						<td><a id='teamPlayersRow' href='$link'><b>$playerName</b><br>$role</a></td>	
					</tr>					
				</table>
				</div>
				";
			}
			echo 
			"
			</div>
			";
			
		}
	

?>

