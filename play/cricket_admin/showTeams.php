<?php
	require 'adminPanel.php';

	$sql="SELECT * from teams";
	$result=mysql_query($sql);
	if (!$result) {
	    die('Invalid query: ' . mysql_error());
	}else if(mysql_num_rows($result)){
		echo "
		<div id='tableDiv'>
		<table class='table table-striped table-bordered table-condensed' width='400' >
			<tr id='tableHead'>
				<td>Flag</td>
				<td>Team</td>
				<td colspan='2'>Action</td>
			</tr>
		";
		while($row=mysql_fetch_array($result)){
			$id=$row['team_id'];
			$team=$row['team_name'];
			$logo=$row['team_logo'];
			
			$logo='uploads/'.$logo;
			echo "
			<tr>
				<td><img src='$logo' id='teamLogoView'></td>
				<td>$team</td>
				<td><a href='showTeamPlayers.php?id=$id&team=$team'><button class='btn btn-success'>Show Players</button></a></td>
				<td><button class='btn btn-danger' onclick='deleteTeamButtonClicked($id);'>Delete Team</button></a></td>
			</tr>
			";
		}
		echo "
		</table>
		</div>
		";
	}else{
		echo "There are no teams in the database.";
	}
?>