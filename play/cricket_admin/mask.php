<?php
	ob_start();//new
	session_start();
	require 'myConnection.php';
	require 'phpFunctions.php';
	require 'modalDivs.php';
?>


<!DOCTYPE html>

<html>

<head>
	<title>Cricket Contest Admin</title>	
	<link rel="icon" href="images/redBallIcon.png">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<!-- API header files -->
	<script src="apiFiles/jquery-1.10.2.min.js"></script>
	<script src="apiFiles/bootstrap.js"></script>
	<link href="apiFiles/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="apiFiles/bootstrap-theme.css">

	<script type="text/javascript" src="apiFiles/bootbox.js"></script>
 	<script type="text/javascript" src="apiFiles/sorttable.js"></script>
	<script type="text/javascript" src="apiFiles/bootstrap-tooltip.js"></script>

	<!-- Date and Time Headers -->
	<link rel="stylesheet" type="text/css" href="dateTimePickerFiles/jquery.datetimepicker.css"/>	
	<script src="dateTimePickerFiles/jquery.datetimepicker.js"></script>
	<script src="dateTimePickerFiles/datetimeFunctions.js"></script>
	<script src="dateTimePickerFiles/jquery1.js"></script>

	<!-- Personal header files -->
	<script type="text/javascript" src="cricketAdminScripts.js" ></script>
	<link type="text/css" rel="stylesheet" href="cricketAdminStyles.css">

	<!-- AJAX Functions -->
	<script type="text/javascript">
		//Update Player Score
		function updatePlayerScore(id, value, match) {
			//alert(id);
			//alert(value);
		  	//alert(match);
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
		  xmlhttp.open("GET","updatePlayerScore.php?id="+id+"&value="+value+"&match="+match,true);
		  xmlhttp.send();
		}
		//Update Player Name
		function updatePlayerName(id, value) {
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

		  xmlhttp.open("GET","updatePlayerName.php?id="+id+"&value="+value,true);
		  xmlhttp.send();
		}
		//Update Player Role
		function updatePlayerRole(id, value) {
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
		  xmlhttp.open("GET","updatePlayerRole.php?id="+id+"&value="+value,true);
		  xmlhttp.send();
		}
		//Update Player Description
		function updatePlayerDescription(id, value) {	
			var textToSend = encodeURIComponent(value);
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
		  xmlhttp.open("GET","updatePlayerDescription.php?id="+id+"&value="+textToSend,true);
		  xmlhttp.send();
		}
		//Update Player Link
		function updatePlayerLink(id, value) {
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

		  xmlhttp.open("GET","updatePlayerLink.php?id="+id+"&value="+value,true);
		  xmlhttp.send();
		}
		//Update Add Title
		function updateAddTitle(id, value) {
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
		  xmlhttp.open("GET","updateAddTitle.php?id="+id+"&value="+value,true);
		  xmlhttp.send();
		}
		//Update Add Logo
		function updateAddFile(id, value) {
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
		  xmlhttp.open("GET","updateAddLogo.php?id="+id+"&value="+value,true);
		  xmlhttp.send();
		}

	</script>

</head>

<body id="maskBody">

	<div id="tempDiv">	
	</div>

</body>

</html>