<?php
	$sql="SELECT * FROM teams";
	$result=mysql_query($sql);
	if (!$result) {
	    die('Invalid query: ' . mysql_error());
	}else{
		echo "<select id='team2' name='team2' class='form-control'>";
		echo "	 <option selected disabled value='0'>Choose a team</option>";
		while($row=mysql_fetch_array($result)){
			$teamId=$row['team_id'];
			$teamName=$row['team_name'];
			echo "<option value='$teamId'>$teamName</option>";
		}
		echo "</select>";
	}
?>