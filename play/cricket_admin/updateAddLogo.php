<?php
ob_start();
session_start();
if(isset($_GET['id'])){

	require 'myConnection.php';	

	$id = $_GET['id'];
	$value = $_GET['value'];

	/* File Upload Starts *
	$fileInfo = pathinfo($_FILES["sponsorLogo"]["name"]);
	$fileName='file'.'$id'.'.'.$fileInfo['extension'];
	$ipath = "adds/" .$fileName;
	move_uploaded_file($_FILES["sponsorLogo"]["tmp_name"], $ipath);
	/* File Upload Ends */

	
	$sql="UPDATE adds SET add_file='$value',entry_date_time=now() WHERE (add_id='$id')";
	$result=mysql_query($sql);
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
}

?>