<?php
	$sql="SELECT * FROM sponsors";
	$result=mysql_query($sql);
	if (!$result) {
	    die('Invalid query: ' . mysql_error());
	}else{
		while($row=mysql_fetch_array($result)){
			$file='cricket_admin/uploads/'.$row['sponsor_logo'];
			$name=$row['sponsor_name'];
			echo "
			<div class='sponsorBox'>
				<img src='$file' height='100px'>
			</div>
			";
		}
	}
?>