<?php
	$user_id=$_SESSION['cricket_user_id'];
	$sql="SELECT name FROM user_accounts WHERE id='$user_id'";
	$result=mysql_query($sql);
	if (!$result) {
	    die('Invalid query: ' . mysql_error());
	}else if(mysql_num_rows($result)){
		//User successfully logged in. Continue with user panel.//
		$row=mysql_fetch_array($result);
		$user_name=$row['name'];
		echo "
		<div align='right'>
			Welcome <span id='userNameSpan'>$user_name</span><br>
			<input class='btn btn-xs btn-danger' type='button' value='Log Out' id='logOutButton' name='logOutButton' onclick='logOutButtonPressed();'>
			<a class='btn btn-xs btn-warning' href='#accountInformation' role='button' data-toggle='modal'>Modify Account Information</a>
		</div>
		";
		//html code begins here.
		?>
		<hr>
		<div id="mainUserDiv">
			<!--
			<div id="historyDiv">
				<div id="matchHistoryDiv">
					Your previous matches.
				</div>
				<div id="lastMatchScoreDiv">
					Score of you last match.
				</div>
			</div>
			-->
			<div id="matchAndLeaderboardDiv">				
				<div id="leaderBoardDiv" align="center">
					<div id="leaderTitleDiv">
						Leaderboard
					</div>
					<div id="leaderBodyDiv">
						<marquee direction="up" id='scoreMarquee' height="100%">
							<?php include 'showLeaderBoard.php'; ?>				
						</marquee>
					</div>
				</div>

				<div id="matchDiv">
					<div align="center">					
						<?php require 'showUpcomingMatches.php'; ?>					
					</div>
					<!--
					<div id="recentMatchesDiv">
						Recent Matches
					</div>
					-->
				</div>
			</div>
		</div>
		
		<?php

	}else{
		echo "
			<script>
				alert('Authentication Error');
				document.location.href='destroySession.php';
			</script>
		";

	}
	
?>