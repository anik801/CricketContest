
<!-- Modal Divs -->
	<!-- Play Here Modal -->
	<div class="modal fade" id="playModal">
	  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
	  <div class="modal-dialog" id="playModalDialog">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
	          <h4 class="modal-title">Login | Registration</h4>
	        </div>

	        <div class="modal-body">
	        	<!--Login Div-->
	        	<div id="loginDiv">
	        	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
	        		<div class="maodalSubTitle" align="center">Login Here</div>
	        		<table class="table table-striped table-bordered table-hover table-condensed"><tbody>

	        		<tr>
	        			<td>Email:</td>
	        			<td><input class="form-control" required id="email" name="email" placeholder="Enter your email here."  type="text" value=""></td>
	        		</tr>

	        		<tr>
	        			<td>Password:</td>
	        			<td><input class="form-control" required id="password" name="password" placeholder="Enter your password here."  type="password" value=""></td>
	        		</tr>        		
	        		<tr>
	        			<td colspan="2" align="right"><input type="button" class="btn btn-primary" value="Login" onclick="loginButtonPressed();"> </td>
	        		</tr>
	          		</tbody></table>
	          		<input type="submit" id="loginSubmitButton" name ="loginSubmitButton" style="display:none">   
	          	</form>
	        	</div>
	        	<!--Registration Div-->
	        	<div id="registrationDiv">
	        	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
	        		<div class="maodalSubTitle" align="center">Create New Account</div>
	        		<table class="table table-striped table-bordered table-hover table-condensed"><tbody>

	        		<tr>
	        			<td>Name:</td>
		        		<td><input class="form-control" required id="register_username" name="register_username" placeholder="Enter your desired username."  type="text"></td>
		        	</tr>
		        	<tr>
		        		<td>Email:</td>
				        <td><input class="form-control" required id="register_email" name="register_email" placeholder="Enter your email address."  type="text" onblur="checkUserAvailibility(this.value)"></td>
				    </tr>
				    <tr>
				    	<td>Password:</td>
			          	<td><input class="form-control" required id="register_password" name="register_password" placeholder="Enter your password here."  type="password"></td>
			        </tr>
			        <tr>
			        	<td>Re-type Password:</td>
						<td><input class="form-control" required id="re_password" name="re_password" placeholder="Enter your password again."  type="password"></td>
					</tr>
					<tr>
						<td>Contact No:</td>
			          	<td><input class="form-control" required id="register_mobile" name="register_mobile" placeholder="Enter your contact number."  type="text"></td>
			        </tr>
			        <tr>
			        	<td>Age:</td>
				        <td><input class="form-control" required id="register_age" name="register_age" placeholder="Enter age (eg: 26)."  type="text"></td>
				    </tr>			        
			        <tr>
			        	<td>Gender:</td>
				        <td>
					        <select class="form-control" id="gender" name="gender">
					        	<option value="male">Male</option>
					        	<option value="female">Female</option>
					        </select>
				        </td>
			        </tr>
			        <tr>
			        	<td colspan="2" align="right"><input type="button" class="btn btn-success" value="Register" onclick="registerButtonPressed();"> </td>
			        </tr>
			        </tbody></table>
			        <input type="submit" id="registerSubmitButton" name ="registerSubmitButton" style="display:none">
			    </form>
	        	</div>
	          

	          	<div id="mandatoryField"><span id="mandatoryField">*All fields are mandatory.</span></div>
	        </div>

	        <div class="modal-footer" id="loginFooter">
	          <a href="#" data-dismiss="modal" class="btn btn-default" onclick="clearFileds();">Close</a>  
	          	
	        </div>
	      </div>
	    </div>
	  </form> 
	</div>

	<!-- Account Information Modal -->
	<div class="modal fade" id="accountInformation">
	  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
	  <div class="modal-dialog" id="accountInformationDialog">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
	          <h4 class="modal-title">Account Information</h4>
	        </div>

	        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
	        <div class="modal-body">
	        		<?php
	        			$userId=$_SESSION['cricket_user_id'];
	        			$sql="SELECT * FROM user_accounts WHERE id='$userId'";
	        			$result=mysql_query($sql);
						if (!$result) {
						    die('Invalid query: ' . mysql_error());
						}else if(mysql_num_rows($result)){	
							$row=mysql_fetch_array($result);
							$name=$row['name'];
							$contact=$row['contact'];
							$age=$row['age'];
							$gender=$row['gender'];

						}
	        		?>
	        		<table class="table table-striped table-bordered table-hover table-condensed"><tbody>
	        			<tr>
		        			<td>Name:</td>
			        		<td><input class="form-control" required name="updateUsername" placeholder="Enter your desired username."  type="text" value="<?php echo $name; ?>"></td>
			        	</tr>
						<tr>
							<td>Contact No:</td>
				          	<td><input class="form-control" required id="updateMobile" name="updateMobile" placeholder="Enter your contact number."  type="text" value="<?php echo $contact; ?>"></td>
				        </tr>
				        <tr>
				        	<td>Age:</td>
					        <td><input class="form-control" required id="updateAge" name="updateAge" placeholder="Enter age (eg: 26)."  type="text" value="<?php echo $age; ?>"></td>
					    </tr>			        
				        <tr>
				        	<td>Gender:</td>
					        <td>
						        <select class="form-control" name="updateGender">
						        <?php
						        	if($gender==="male"){
						        		echo "
											<option value='male'>Male</option>	
								        	<option value='female'>Female</option>
						        		";
						        	}else{
						        		echo "
											<option value='female'>Female</option>	
								        	<option value='male'>Male</option>
						        		";
						        	}
						        ?>
						        	
						        </select>
					        </td>
				        </tr>

	          		</tbody></table>	          
	          	<div id="mandatoryField"><span id="mandatoryField">*All fields are mandatory.</span></div>
	        </div>

	        <div class="modal-footer">
	          <a href="#" data-dismiss="modal" class="btn btn-default" onclick="clearFileds();">Close</a>
	          <input type="button" class="btn btn-primary" value="Update Information" onclick="updateInformationButtonPressed();">
	          <input type="submit" id="updateInformationSubmitButton" name ="updateInformationSubmitButton" style="display:none">   
	        </div>

	        </form>

	      </div>
	    </div>
	  </form> 
	</div>

	<!-- User Team Modal -->
	<div class="modal fade" id="userTeam">
	  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
	  <div class="modal-dialog" id="userTeamDialog">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
	          <h4 class="modal-title">Your Squad</h4>
	        </div>

	        <div class="modal-body">
	        		<div id="userTeamModalDiv">
	        			
	        		</div>
	        </div>

	        <div class="modal-footer">
	          <a href="#" data-dismiss="modal" class="btn btn-default" onclick="clearFileds();">Close</a>
	        </div>

	        </form>

	      </div>
	    </div>
	  </form> 
	</div>	
