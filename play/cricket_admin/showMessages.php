<?php
	require 'adminPanel.php';

	$sql="SELECT * from messages ORDER BY message_date_time DESC";
	$result=mysql_query($sql);
	if (!$result) {
	    die('Invalid query: ' . mysql_error());
	}else if(mysql_num_rows($result)){
		echo "<div id='tableDiv'>";
		while($row=mysql_fetch_array($result)){
			$name=$row['sender_name'];
			$email=$row['sender_email'];
			$description=$row['message_description'];
			$dateTime=$row['message_date_time'];

			echo "
			<div id='messageDiv'>
			<table class='table table-striped table-bordered table-condensed' id='messageTable'><tbody>
				<tr>
					<td><b>Sender</b></td>
					<td>$name</td>
				</tr>
				<tr>
					<td><b>Email</b></td>
					<td>$email</td>
				</tr>
				<tr>
					<td><b>Received Time</b></td>
					<td>$dateTime</td>
				</tr>
				<tr>
					<td><b>Message</b></td>
					<td>$description</td>
				</tr>
			</table>
			</div>
			";
		}
		echo "</div>";
	}else{
		echo "There are no messages in the database.";
	}
?>