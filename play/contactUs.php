<?php
	ob_start();//new
	?>
	<div id="contactUsDiv" align="center">
		<div id="contactUsTitleDiv"><h4><b>Got any query? Feel free to leave us a message.</b></h4><hr></div>
		<div id="addsDiv1">
			<?php include 'showAdd1.php'; ?>
		</div>
		<div id="addsDiv2">
			<?php include 'showAdd2.php'; ?>
		</div>
		<div>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
			<table>
				<tr>
					<td><label>Name </label></td>
					<td><input class="form-control contactUsTranparent" type="text" required name="contactName" id="contactName" size="80" placeholder="Enter your name here."/></td>
				</tr>
				<tr>
					<td><label>Email </label></td>
					<td><input class="form-control contactUsTranparent" type="email" required name="contactEmail" id="contactEmail" placeholder="Enter your email address here."/></td>
				</tr>
				<tr>
					<td><label>Message </label></td>
					<td><textarea class="form-control contactUsTranparent" type="text" required name="contactDescription" id="contactDescription" rows="10" placeholder="Type in your message here. Your opinion is highly welcomed."></textarea></td>
				</tr>
				<tr>
					<td colspan="2">
						<div align="right">
							<button class="btn btn-danger" type="reset">Cancel</button>
							<input class="btn btn-primary" type="submit" name="contactUsSubmitButton" value="Send Message" />
						</div>
					</td>
				</tr>
			</table>
			</form>
		</div>
		
	</div>

	<?php
?>

