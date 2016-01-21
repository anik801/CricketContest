<?php
	require 'adminPanel.php';

	$sql="SELECT * from sponsors";
	$result=mysql_query($sql);
	if (!$result) {
	    die('Invalid query: ' . mysql_error());
	}else if(mysql_num_rows($result)){
		echo "
		<div id='tableDiv'>
		<table class='table table-striped table-bordered table-condensed' width='400' >
			<tr id='tableHead'>
				<td>Logo</td>
				<td>Title</td>
				<td>Added On</td>
				<td>Action</td>
			</tr>
		";
		while($row=mysql_fetch_array($result)){
			$id=$row['sponsor_id'];
			$name=$row['sponsor_name'];
			$logo=$row['sponsor_logo'];
			$entry=$row['entry_date_time'];
			
			$logo='uploads/'.$logo;
			echo "
			<tr>
				<td><img src='$logo' id='teamLogoView'></td>
				<td>$name</td>
				<td>$entry</td>
				<td><button class='btn btn-danger' onclick='deleteSponsorButtonClicked($id);'>Delete Sponsor</button></a></td>
			</tr>
			";
		}
		echo "
		</table>
		</div>
		";
	}else{
		echo "There are no sponsors in the database.";
	}
?>