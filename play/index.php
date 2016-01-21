<?php
	ob_start();//new
	session_start();
	include 'myConnection.php';
	include 'phpFunctions.php';
?>


<!DOCTYPE html>

<html>

<head>
	<title>Cricket Contest</title>	
	<link rel="icon" href="cricket_admin/images/redBallIcon.png">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	

	<!-- API header files -->
	<script src="apiFiles/jquery-1.10.2.min.js"></script>
	<script src="apiFiles/bootstrap.js"></script>
	<link href="apiFiles/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="apiFiles/bootstrap-theme.css">

	<script type="text/javascript" src="apiFiles/bootbox.js"></script>
 	<script type="text/javascript" src="apiFiles/sorttable.js"></script>
	<script type="text/javascript" src="apiFiles/bootstrap-tooltip.js"></script>
	
	<!-- Pop-Up Header -->
	<script src="apiFiles/jquery.popup.js"></script>
	<link href="apiFiles/popup.css" rel="stylesheet">


	<!-- Personal header files -->
	<script type="text/javascript" src="myScripts.js" ></script>
	<link type="text/css" rel="stylesheet" href="myStyles.css">

	<!-- Slider Headers -->
	<link rel="stylesheet" type="text/css" href="sliderFiles/sliderStyle.css" />
	<script type="text/javascript" src="sliderFiles/sliderScript.js"></script>

	<!--AJAX Scripts-->
	<script type="text/javascript">
	  	//AJAX function to dynamically change elements

	  	//show players	  	
	  	function showPlayers(id) {
		  if (window.XMLHttpRequest) {
		    // code for IE7+, Firefox, Chrome, Opera, Safari
		    xmlhttp=new XMLHttpRequest();
		  } else { // code for IE6, IE5
		    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  xmlhttp.onreadystatechange=function() {
		    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		      document.getElementById("squadSelectionDiv").innerHTML=xmlhttp.responseText;
		    }
		  }
		  xmlhttp.open("GET","showPlayers.php?id="+id,true);
		  xmlhttp.send();
		}	
				
		//insert user player
		function insertPlayer(id,match) {
		  if (window.XMLHttpRequest) {
		    // code for IE7+, Firefox, Chrome, Opera, Safari
		    xmlhttp=new XMLHttpRequest();
		  } else { // code for IE6, IE5
		    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  xmlhttp.onreadystatechange=function() {
		    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		      document.getElementById("tempDiv").innerHTML=xmlhttp.responseText;
		    }
		  }
		  xmlhttp.open("GET","insertUserPlayer.php?player="+id+"&match="+match,true);
		  xmlhttp.send();
		}

		//show user team
		function showUserTeam(matchId) {
		  if (window.XMLHttpRequest) {
		    // code for IE7+, Firefox, Chrome, Opera, Safari
		    xmlhttp=new XMLHttpRequest();
		  } else { // code for IE6, IE5
		    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  xmlhttp.onreadystatechange=function() {
		    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		      document.getElementById("userTeamModalDiv").innerHTML=xmlhttp.responseText;
		    }
		  }
		  xmlhttp.open("GET","showUserTeam.php?match="+matchId,true);
		  xmlhttp.send();
		}

		//show team players
		function reloadPlayers(id) {
		  if (window.XMLHttpRequest) {
		    // code for IE7+, Firefox, Chrome, Opera, Safari
		    xmlhttp=new XMLHttpRequest();
		  } else { // code for IE6, IE5
		    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  xmlhttp.onreadystatechange=function() {
		    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		      document.getElementById("teamPlayersDiv").innerHTML=xmlhttp.responseText;
		    }
		  }
		  xmlhttp.open("GET","showTeamPlayers.php?id="+id,true);
		  xmlhttp.send();
		}
	  	
		
	  </script>



</head>


<body id="top">

	<ul class="cb-slideshow">
        <li><span>Image 01</span><div><h3></h3></div></li>
        <li><span>Image 02</span><div><h3></h3></div></li>
        <li><span>Image 03</span><div><h3></h3></div></li>
        <li><span>Image 04</span><div><h3></h3></div></li>
        <li><span>Image 05</span><div><h3></h3></div></li>
        <li><span>Image 06</span><div><h3></h3></div></li>
	</ul>

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
		      <a class="navbar-brand" id="pointers" onclick="goToByScroll('top');"><b id='headerTitle'><?php echo "ICC Cricket World Cup 2015"; ?></b></a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		      	<li><a id="pointers" onclick="goToByScroll('top');">Let's Play</a></li>
		      	<li><a id="pointers" onclick="goToByScroll('howToPlayDiv');">How To Play</a></li>
		        <li><a id="pointers" onclick="goToByScroll('rulesAndScoringDiv');">Rules and Scoring</a></li>
		        
		        <li class="dropdown inverse-dropdown">
	                <a href="" class="dropdown-toggle" data-toggle="dropdown">Teams <b class="caret"></b></a>
	                <ul class="dropdown-menu">
	                  <?php require 'showTeamList.php'; ?>
	                </ul>
	            </li>

		        <li><a id="pointers" onclick="goToByScroll('prizesDiv');">Prizes</a></li>
		        <li><a id="pointers" onclick="goToByScroll('contatUsDiv');">Contact Us</a></li>
		        <li><a id="pointers" onclick="goToByScroll('faqDiv');">FAQ</a></li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
	</div>
</div>

<div id="belowTopBar">
	<div id="playHere">
	<?php
		if(isset($_SESSION['cricket_user_id'])){
			require 'userPanel.php';
		}else {
			?>
			<div align='center'><a id='playButton' href='#playModal' role='button' data-toggle='modal'><img id='redBall' src='cricket_admin/images/redBall.png'></a></div>
			<div align='left'><img src='cricket_admin/images/prizesLogo.png' id='prizeLogoImage' onclick="goToByScroll('prizesDiv');"></div>
			<div align='right'><img src='cricket_admin/images/rulesLogo.png' id='rulesLogoImage' onclick="goToByScroll('rulesAndScoringDiv');"></div>

			<?php
		}
		
	?>
	</div>
	<div id="squadSelectionDiv">
	</div>


	<div id="howToPlayDiv">
		<div id="howToPlayInnerDiv">
			<?php require 'howToPlay.php'; ?>	
		</div>
	</div>



	<div id="rulesAndScoringDiv">
		<div id="rulesInnerDiv">
			<?php require 'rulesAndScoring.php'; ?>	
		</div>
		
	</div>

	<div id="teamPlayersDiv">
	</div>

	<div id="prizesDiv">
		<div id="prizesInnerDiv">
			<?php require 'prizes.php'; ?>				
		</div>
	</div>

	<div id="contatUsDiv">
		<div id="contactUsInnerDiv">
			<?php require 'contactUs.php'; ?>
		</div>
	</div>

	<div id="faqDiv">
		<div id="faqInnerDiv">
			<?php require 'faqs.php'; ?>				
		</div>
	</div>

	<div id="sponsorDiv">	
		<div align="center">
			<h4>Our Partners</h4>
		</div>	
		<marquee direction="left" height="100%">
			<?php require 'sponsors.php'; ?>
		</marquee>		
	</div>

</div>


<?php require 'modalDivs.php'; ?>

<div id="tempDiv">
</div>

</body>


</html>