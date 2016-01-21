<?php
	require 'adminPanel.php';

	$sql="SELECT * from adds";
	$result=mysql_query($sql);
	if (!$result) {
	    die('Invalid query: ' . mysql_error());
	}else if(mysql_num_rows($result)){
		echo "
		<div id='tableDiv'>
		<table class='table table-striped table-bordered table-condensed' width='400' >
			<tr id='tableHead'>
				<td>ID</td>
				<td>Logo</td>
				<td>Title</td>
				<td>Added On</td>
			</tr>
		";
		while($row=mysql_fetch_array($result)){
			$id=$row['add_id'];
			$name=$row['add_title'];
			$logo='adds/'.$row['add_file'];
			$entry=$row['entry_date_time'];
			$fileId='file'.$id;
			$titleId='title'.$id;

			echo "
			<tr>
				<td>$id</td>
				<td>
					<img src='$logo' id='teamLogoView'>
					";?>
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
					<?php
					echo"
						<input style='display:none' value='$id' name='fileId'/>
						<input class='form-control' id='$fileId' name='addFile' type='file'/>
						<input class='btn btn-success' type='submit' name='addLogoSubmitButton' value='Change/Insert'/>
					</form>

				</td>
				<td>
					$name
					<input class='form-control' placeholder='Enter to change.' type='text' value='$name' onchange='updateAddTitle($id,this.value)'/>
				</td>
				<td>$entry</td>
			</tr>
			";
			
			
			$logo='uploads/'.$logo;
			
		}
		echo "
		</table>
		<div align='center'><a href=''><button class='btn btn-warning'>Done</button></a></div>
		</div>
		";
	}else{
		echo "There are no adds in the database.";
	}
?>