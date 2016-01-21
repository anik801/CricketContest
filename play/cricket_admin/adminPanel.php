<?php
	require 'mask.php';
	require 'loginCheck.php';
?>

<!--
<div>
	<div id="headerDiv">
		<div id="leftHeader">
			Welcome To<br><a class='btn btn-sm btn-default' href='adminPanel.php'>Cricket Contest Admin Panel</a>
		</div>
		<div id="rightHeader">			
			<a class='btn btn-xs btn-warning' href='#accountInformation' role='button' data-toggle='modal'>Modify Account Information</a>		
			<input class='btn btn-xs btn-danger' type='button' value='Log Out' id='logOutButton' name='logOutButton' onclick='logOutButtonPressed();'>		
		</div>
	</div>

	<div id="optionsDiv" align="center">
		<a class='btn btn-sm btn-success' href='#createTeam' role='button' data-toggle='modal'>Create New Team</a>		
		<a class='btn btn-sm btn-success' href='#insertPlayer' role='button' data-toggle='modal'>Insert New Player to a Team</a>
		<a class='btn btn-sm btn-success' href='#createMatch' role='button' data-toggle='modal'>Create Match</a>
		<a class='btn btn-sm btn-primary' href='showTeams.php' type="button" >Show Teams</a>
		<a class='btn btn-sm btn-primary' href='showMatches.php' type="button" >Show Matches</a>
		<a class='btn btn-sm btn-primary' href='showMessages.php' type="button" >Messages</a>
	</div>
</div>
-->

<!--Nav Bar/Header Bar -->
<div id="topBar">
	<div class="row">
		<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" id="pointers" href='adminPanel.php'><b id='headerTitle'>ICC Cricket World Cup 2015 Admin Panel</b></a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		      	<li><a href='#accountInformation' role='button' data-toggle='modal'>Modify Account Information</a></li>
		        <li><a id="pointers" onclick='logOutButtonPressed();'>Log Out</a></li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
	</div>
</div>

<div class="container">

	<div id="optionsDiv" align="center">
		<a class='btn btn-sm btn-success' href='#insertSponsor' role='button' data-toggle='modal'>Insert Sponsor</a>
		<a class='btn btn-sm btn-success' href='#createTeam' role='button' data-toggle='modal'>Create New Team</a>		
		<a class='btn btn-sm btn-success' href='#insertPlayer' role='button' data-toggle='modal'>Insert New Player to a Team</a>
		<a class='btn btn-sm btn-success' href='#createMatch' role='button' data-toggle='modal'>Create Match</a>
		<a class='btn btn-sm btn-primary' href='showScores.php' type="button" >Show Scores</a>
		<a class='btn btn-sm btn-primary' href='showTeams.php' type="button" >Show Teams</a>
		<a class='btn btn-sm btn-primary' href='showMatches.php' type="button" >Show Matches</a>
		<a class='btn btn-sm btn-primary' href='showMessages.php' type="button" >Messages</a>
		<a class='btn btn-sm btn-primary' href='showSponsors.php' type="button" >Sponsors</a>
		<a class='btn btn-sm btn-primary' href='showAdds.php' type="button" >Adds</a>
	</div>
</div>
