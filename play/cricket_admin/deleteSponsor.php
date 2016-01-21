<?php
	require 'mask.php';
	require 'loginCheck.php';

	if(isset($_GET['id'])){
		$sponsorId=$_GET['id'];

		$sql="DELETE FROM sponsors WHERE sponsor_id='$sponsorId'";
		$result=mysql_query($sql);
		if (!$result) {
		    die('Invalid query: ' . mysql_error());
		}else{
			Header("Location: showSponsors.php");
			exit;
		}
		
	}
?>
