<?php
	require 'mask.php';
?>

<div id="loginDiv">
	<div id="loginTitleDiv">Cricket Contest Admin Panel</div>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		<table class='table table-bordered table-condensed' width='400' >
			<tr>
				<td><b>Email</b></td>
				<td><input class="form-control" type="email" name="loginEmailInput" id="loginEmailInput" required/></td>
			</tr>
			<tr>
				<td><b>Password</b></td>
				<td><input class='form-control' type="password" name="loginPasswordInput" id="loginPasswordInput" required/> </td>
			</tr>
			<tr>
				<td colspan="2">
					<div align="right">
						<input class='btn btn-danger' type="reset" value="Reset">
						<input class='btn btn-primary' type="submit" name="loginSubmitButton" value="Log In">
					</div>
				</td>
			</tr>
		</table>
	</form>
</div>