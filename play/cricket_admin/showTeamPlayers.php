<?php
	require 'adminPanel.php';
	

	if(isset($_GET['team'])){
		$teamId=$_GET['id'];
		$team=$_GET['team'];

		$sql="SELECT * from players WHERE team_id='$teamId'";
		$result=mysql_query($sql);
		if (!$result) {
		    die('Invalid query: ' . mysql_error());
		}else if(mysql_num_rows($result)){
			echo "<div>";
			while($row=mysql_fetch_array($result)){
				$playerId=$row['player_id'];
				$name=$row['player_name'];
				$description=$row['player_description'];
				$role=$row['player_role'];
				$link=$row['external_link'];
				$image='uploads/'.$row['player_image'];


				$statusValue=$row['player_status'];
				if($statusValue==='1'){
					$status='Active';
					$data='0';
				}else{
					$status='Inactive';
					$data='1';
				}

				echo "
				<div id='tableDiv'>
				<table class='table table-striped table-bordered table-hover table-condensed'><tbody>
					<tr>
						<td><b>Player</b></td>
						<td><img src='$image' id='playerLogoView'><br><input class='form-control' type='text' value='$name' onblur='updatePlayerName($playerId,this.value)'/></td>
					</tr>
					<tr>
						<td><b>Role</b></td>
						<td><input class='form-control' type='text' value='$role' onblur='updatePlayerRole($playerId,this.value)'/></td>
					</tr>
					<tr>
						<td><b>Description</b></td>
						<td><textarea id='playerDescriptionUpdateField' class='form-control' type='text' rows='4' onblur='updatePlayerDescription($playerId,this.value)'>$description</textarea></td>
					</tr>
					<tr>
						<td><b>Profile Link</b></td>
						<td><input class='form-control' type='text' value='$link' onblur='updatePlayerLink($playerId,this.value)'/></td>
					</tr>
					<tr>
						<td><b>Status</b></td>
						<td>$status</td>
					</tr>
					<tr>
						<td><b>Action</b></td>
						<td><a href='changePlayerStatusFunction.php?id=$playerId&data=$data&team=$team&teamId=$teamId'><button class='btn btn-warning'>Change Player Status</button></a></td>
					</tr>
					<tr>
						<td><b>Action</b></td>
						<td><button class='btn btn-danger' onclick='deletePlayerButtonClicked($playerId);'>Delete Player</button></a></td>
					</tr>
				</table>
				</div>
				";
			}
			echo "</div>";
		}else{
			echo "There are no player in the selected team.";
		}
	}
?>