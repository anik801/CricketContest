<?php
	if(isset($_POST['loginSubmitButton'])){
		$un=mysql_real_escape_string($_POST['loginEmailInput']);
		$pw=mysql_real_escape_string($_POST['loginPasswordInput']);
		$un=md5($un);
		$pw=md5($pw);
		
		$sql="SELECT admin_id FROM `admin_accounts` WHERE `email_en`='$un' AND `password_en`='$pw'";
		$result=mysql_query($sql);
		if (!$result) {
		   	die('Invalid query: ' . mysql_error());
		 	break;
		}
		if(mysql_num_rows($result)>0){
			$row=mysql_fetch_array($result);
			$_SESSION['cricket_admin_id']=$row['admin_id'];
			header('Location: index.php');
			exit();//new
		}else{
			echo "<script>alert('Authentication Error.');</script>";
		}
	}else if(isset($_POST['updateInformationSubmitButton'])){
		$email=mysql_real_escape_string($_POST['updateEmail']);
		$email_en=md5($email);
		$id=$_SESSION['cricket_admin_id'];
		if($_POST['newPassword']!==''){
			$password=mysql_real_escape_string($_POST['newPassword']);			
			$password_en=md5($password);
			$sql="UPDATE admin_accounts set email='$email', password='$password', email_en='$email_en', password_en='$password_en' WHERE admin_id='$id'";
			$result=mysql_query($sql);
			if (!$result) {
			   	die('Invalid query: ' . mysql_error());
			 	break;
			}else{			
				echo "
					<script>
					alert('Account information succesfully updated.');
					document.location.href='index.php';
					</script>
					";
			}
		}else{
			$sql="UPDATE admin_accounts set email='$email', email_en='$email_en' WHERE admin_id='$id'";
			$result=mysql_query($sql);
			if (!$result) {
			   	die('Invalid query: ' . mysql_error());
			 	break;
			}else{			
				echo "
					<script>
					alert('Account information succesfully updated.');
					document.location.href='index.php';
					</script>
					";
			}
		}
	}else if(isset($_POST['createTeamSubmitButton'])){
		$team=$_POST['teamName'];
		/* File Upload Starts */
		$fileInfo = pathinfo($_FILES["teamLogo"]["name"]);
		$fileName=uniqid().'.'.$fileInfo['extension'];
		$ipath = "uploads/" .$fileName;
		move_uploaded_file($_FILES["teamLogo"]["tmp_name"], $ipath);
		/* File Upload Ends */

		$sql="INSERT INTO teams (team_name,team_logo,date_time) VALUES ('$team','$fileName',now())";
		$result=mysql_query($sql);
		if (!$result) {
		   	die('Invalid query: ' . mysql_error());
		 	break;
		}else{			
			echo "
				<script>
				alert('Team Created.');
				document.location.href='';
				</script>
				";
		}
	}else if(isset($_POST['insertPlayerSubmitButton'])){
		$name=mysql_real_escape_string($_POST['playerName']);
		$role=mysql_real_escape_string($_POST['playingRole']);
		$description=mysql_real_escape_string($_POST['playerDescription']);
		$team=mysql_real_escape_string($_POST['teamNames']);

		/* File Upload Starts */
		$fileInfo = pathinfo($_FILES["playerImage"]["name"]);
		$fileName=uniqid().'.'.$fileInfo['extension'];
		$ipath = "uploads/" .$fileName;
		move_uploaded_file($_FILES["playerImage"]["tmp_name"], $ipath);
		/* File Upload Ends */
	
		$sql="INSERT INTO players (player_name,player_role,player_image,player_description,team_id,date_time) VALUES
			('$name','$role','$fileName','$description','$team',now())";
		$result=mysql_query($sql);
		if (!$result) {
		   	die('Invalid query: ' . mysql_error());
		 	break;
		}else{			
			echo "
				<script>
				alert('Player Inserted Succesfully.');
				document.location.href='';
				</script>
				";
		}
	}else if(isset($_POST['createMatchSubmitButton'])){
		$team1=mysql_real_escape_string($_POST['team1']);
		$team2=mysql_real_escape_string($_POST['team2']);
		$matchType=mysql_real_escape_string($_POST['matchType']);
		$venue=mysql_real_escape_string($_POST['venue']);
		$schedule=mysql_real_escape_string($_POST['schedule']);
		
		$sql="INSERT INTO matches (first_team,second_team,venue,match_type,schedule,entry_date_time) VALUES ('$team1','$team2','$venue','$matchType','$schedule',now())";
		$result=mysql_query($sql);
		if (!$result) {
		   	die('Invalid query: ' . mysql_error());
		 	break;
		}else{		
			$sql="SELECT match_id FROM matches ORDER BY entry_date_time DESC LIMIT 1";
			$result=mysql_query($sql);
			if (!$result) {
			   	die('Invalid query: ' . mysql_error());
			 	break;
			}else{
				$row=mysql_fetch_array($result);
				$matchId=$row['match_id'];
				$sql="SELECT player_id FROM players WHERE team_id='$team1' ";
				$result=mysql_query($sql);
				if (!$result) {
				   	die('Invalid query: ' . mysql_error());
				 	break;
				}else{
					while($row=mysql_fetch_array($result)){
						$playerId=$row['player_id'];
						$sql="INSERT INTO player_scores (match_id,player_id,entry_date_time) VALUES ('$matchId','$playerId',now())";
						mysql_query($sql);
					}
				}

				$sql="SELECT player_id FROM players WHERE team_id='$team2' ";
				$result=mysql_query($sql);
				if (!$result) {
				   	die('Invalid query: ' . mysql_error());
				 	break;
				}else{
					while($row=mysql_fetch_array($result)){
						$playerId=$row['player_id'];
						$sql="INSERT INTO player_scores (match_id,player_id,entry_date_time) VALUES ('$matchId','$playerId',now())";
						mysql_query($sql);
					}
				}

				echo "
					<script>
					alert('Match Created Succesfully.');
					document.location.href='';
					</script>
					";
			}
		}

		//echo $fileName;
	}else if(isset($_POST['insertSponsorSubmitButton'])){
		$sponsor=$_POST['sponsorName'];
		/* File Upload Starts */
		$fileInfo = pathinfo($_FILES["sponsorLogo"]["name"]);
		$fileName=uniqid().'.'.$fileInfo['extension'];
		$ipath = "uploads/" .$fileName;
		move_uploaded_file($_FILES["sponsorLogo"]["tmp_name"], $ipath);
		/* File Upload Ends */

		$sql="INSERT INTO sponsors (sponsor_name,sponsor_logo,entry_date_time) VALUES ('$sponsor','$fileName',now())";
		$result=mysql_query($sql);
		if (!$result) {
		   	die('Invalid query: ' . mysql_error());
		 	break;
		}else{			
			echo "
				<script>
				alert('Sponsor Inserted.');
				document.location.href='';
				</script>
				";
		}
	}else if(isset($_POST['addLogoSubmitButton'])){
		$id=$_POST['fileId'];
		/* File Upload Starts */
		$fileInfo = pathinfo($_FILES["addFile"]["name"]);
		$fileName=$id.'.'.$fileInfo['extension'];
		$ipath = "adds/" .$fileName;
		move_uploaded_file($_FILES["addFile"]["tmp_name"], $ipath);
		/* File Upload Ends */

		$sql="UPDATE adds SET add_file='$fileName',entry_date_time=now() WHERE (add_id='$id')";
		//$sql="INSERT INTO sponsors (sponsor_name,sponsor_logo,entry_date_time) VALUES ('$sponsor','$fileName',now())";
		$result=mysql_query($sql);
		if (!$result) {
		   	die('Invalid query: ' . mysql_error());
		 	break;
		}
	}

?>