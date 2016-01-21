<?php
	$sql="SELECT * FROM adds WHERE add_id='2' AND add_title!=''";
	$result=mysql_query($sql);
	if (!$result) {
	    die('Invalid query: ' . mysql_error());
	}else if(mysql_num_rows($result)){
		$row=mysql_fetch_array($result);
		$name=$row['add_title'];
		$link='cricket_admin/adds/'.$row['add_file'];
		
		echo"
			Sponsored Adds<hr>
			<img src='$link' id='add2Image'>
		";


	}
?>