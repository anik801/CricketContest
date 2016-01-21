<?php
ob_start();
session_start();
if(isset($_GET['id'])){

	require 'myConnection.php';	

	$id = $_GET['id'];
	$value = $_GET['value'];


	$sql="UPDATE adds SET add_title='$value',entry_date_time=now() WHERE (add_id='$id')";
	$result=mysql_query($sql);
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
}

?>