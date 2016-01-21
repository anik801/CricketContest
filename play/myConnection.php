<?php
	ob_start();//new
	$host="localhost";
	$username="root";
	$password="";
	$database="play";
	$con=mysql_connect($host,$username,$password,$database);
	if(!$con){
		die("can not connect:".mysql_error());
	}
	mysql_select_db($database,$con);	
?>