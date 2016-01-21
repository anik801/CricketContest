<?php
	require 'mask.php';
	require 'loginCheck.php';

	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$data=$_GET['data'];

		echo $id."<br>".$data;
		$sql="UPDATE matches SET match_status='$data' WHERE match_id='$id' ";
		$result=mysql_query($sql);
		if (!$result) {
		    die('Invalid query: ' . mysql_error());
		}else{
			Header('Location: showMatches.php');
			exit;
		}
	}
?>