<!-- Modal Divs -->
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
        			$id=$_SESSION['cricket_admin_id'];
        			$sql="SELECT * FROM admin_accounts WHERE admin_id='$id'";
        			$result=mysql_query($sql);
  					if (!$result) {
  					    die('Invalid query: ' . mysql_error());
  					}else if(mysql_num_rows($result)){	
  						$row=mysql_fetch_array($result);
  						$email=$row['email'];
  						$password=$row['password'];

  					}
        		?>
        		<table class="table table-striped table-bordered table-hover table-condensed"><tbody>
        			<tr>
	        			<td>Email</td>
		        		<td><input class="form-control" required name="updateEmail" placeholder="Enter your new email address."  type="text" value="<?php echo $email; ?>"></td>
		        	</tr>
					
			        <tr>
			        	<td>New Password</td>
				        <td><input class="form-control"  id="newPassword" name="newPassword" placeholder="Enter only if you want to change password."  type="password"></td>
				      </tr>
				      <tr>
			        	<td>Re-enter Password</td>
				        <td><input class="form-control"  id="newPasswordRe" name="newPasswordRe" placeholder="Enter only if you want to change password."  type="password"></td>
				      </tr>
          		</tbody></table>	          
          	<div id="mandatoryField"><span>*All fields are mandatory.</span></div>
        </div>

        <div class="modal-footer">
          <a href="#" data-dismiss="modal" class="btn btn-default">Close</a>
          <input type="button" class="btn btn-primary" value="Update Information" onclick="updateInformationButtonPressed();">
          <input type="submit" id="updateInformationSubmitButton" name ="updateInformationSubmitButton" style="display:none">  
        </div>

        </form>

      </div>
    </div>
  </form> 
</div>


<!-- Create Team Modal -->
<div class="modal fade" id="createTeam">
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
  <div class="modal-dialog" id="createTeamDialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
          <h4 class="modal-title">Create Team</h4>
        </div>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="modal-body">
            <table class="table table-striped table-bordered table-hover table-condensed"><tbody>
              <tr>
                <td>Team Name</td>
                <td><input class="form-control" required name="teamName" placeholder="Enter team name here."  type="text"/></td>
              </tr>
          
              <tr>
                <td>Team Logo</td>
                <td><input class="form-control" required id="teamLogo" name="teamLogo" type="file" onchange="fileCheck(this,this.id);"/></td>
              </tr>
              
              </tbody></table>            
            <div id="mandatoryField"><span>*All fields are mandatory.</span></div>
        </div>

        <div class="modal-footer">
          <a href="#" data-dismiss="modal" class="btn btn-default">Close</a>
          <input type="submit" class="btn btn-primary" id="createTeamSubmitButton" name ="createTeamSubmitButton" value="Create Team">  
        </div>

        </form>

      </div>
    </div>
  </form> 
</div>


<!-- Insert Player Modal -->
<div class="modal fade" id="insertPlayer">
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
  <div class="modal-dialog" id="insertPlayerDialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
          <h4 class="modal-title">Insert Player</h4>
        </div>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="modal-body">
            <table class="table table-striped table-bordered table-hover table-condensed"><tbody>
              <tr>
                <td>Player Name</td>
                <td><input class="form-control" required name="playerName" placeholder="Enter player name here."  type="text"/></td>
              </tr>

              <tr>
                <td>Playing Role</td>
                <td>
                  <select id="playingRole" name="playingRole" class="form-control">
                    <option value="Batting">Batting</option>
                    <option value="Bowling">Bowling</option>
                    <option value="All Rounder">All Rounder</option>
                    <option value="Wicket Keeper">Wicket Keeper</option>
                  </select>
                </td>
              </tr>

              <tr>
                <td>Description</td>
                <td><textarea class="form-control" required id="playerDescription" name="playerDescription" placeholder="Enter player description like age, sex, ranking here."  type="text" rows="4"></textarea></td>
              </tr>
          
              <tr>
                <td>Picture</td>
                <td><input class="form-control" required id="playerImage" name="playerImage" type="file" onchange="fileCheck(this,this.id);"/></td>
              </tr>

              <tr>
                <td>Team</td>
                <td>
                  <?php require 'showTeamsInSelectBox.php'; ?>                  
                </td>
              </tr>
              
              </tbody></table>            
            <div id="mandatoryField"><span>*All fields are mandatory.</span></div>
        </div>

        <div class="modal-footer">
          <a href="#" data-dismiss="modal" class="btn btn-default">Close</a>
          <input type="submit" class="btn btn-primary" id="insertPlayerSubmitButton" name ="insertPlayerSubmitButton" value="Insert Player">  
        </div>

        </form>

      </div>
    </div>
  </form> 
</div>

<!-- Create Match Modal -->
<div class="modal fade" id="createMatch">
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
  <div class="modal-dialog" id="createMatchDialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
          <h4 class="modal-title">Create New Match</h4>
        </div>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="modal-body">
            <table class="table table-striped table-bordered table-hover table-condensed"><tbody>
              <tr>
                <td>First Team</td>
                <td><?php require 'showFirstTeamInSelectBox.php'; ?></td>
              </tr>
              
              <tr>
                <td>Second Team</td>
                <td><?php require 'showSecondTeamInSelectBox.php'; ?></td>
              </tr>

              <tr>
                <td>Match Type</td>
                <td>
                  <select id="matchType" name="matchType" class="form-control">
                    <option value="Group Match">Group Match</option>
                    <option value="Quarter Final">Quarter Final</option>
                    <option value="Semi Final">Semi Final</option>
                    <option value="Final">Final</option>
                  </select>
                </td>
              </tr>
              
              <tr>
                <td>Venue</td>
                <td><input class="form-control" required name="venue" placeholder="Enter the name of venue here."  type="text"/></td>
              </tr>

              <tr>
                <td>Schedule</td>
                <td><input class="form-control" required name="schedule" type="text" id="schedule" placeholder="Enter match date and time." onclick="$('#schedule').datetimepicker();$('#schedule').datetimepicker('show');" /></td>
                
              </tr>

              
              
              </tbody></table>            
            <div id="mandatoryField"><span>*All fields are mandatory.</span></div>
        </div>

        <div class="modal-footer">
          <a href="#" data-dismiss="modal" class="btn btn-default">Close</a>
          <input type="button" class="btn btn-primary" value="Create Match" onclick="createMatchSubmitButtonPressed();">
          <input type="submit" class="btn btn-primary" id="createMatchSubmitButton" name ="createMatchSubmitButton" value="Create Match" style="display:none;">  
        </div>

        </form>

      </div>
    </div>
  </form> 
</div>

<!-- Insert Sponsor Modal -->
<div class="modal fade" id="insertSponsor">
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
  <div class="modal-dialog" id="insertSponsorDialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
          <h4 class="modal-title">Insert New Sponsor</h4>
        </div>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="modal-body">
            <table class="table table-striped table-bordered table-hover table-condensed"><tbody>
              <tr>
                <td>Sponsor Name</td>
                <td><input class="form-control" required name="sponsorName" placeholder="Enter team name here."  type="text"/></td>
              </tr>
          
              <tr>
                <td>Logo</td>
                <td><input class="form-control" required id="sponsorLogo" name="sponsorLogo" type="file" onchange="fileCheck(this,this.id);"/></td>
              </tr>
              
              </tbody></table>            
            <div id="mandatoryField"><span>*All fields are mandatory.</span></div>
        </div>

        <div class="modal-footer">
          <a href="#" data-dismiss="modal" class="btn btn-default">Close</a>
          <input type="submit" class="btn btn-primary" id="insertSponsorSubmitButton" name ="insertSponsorSubmitButton" value="Insert Sponsor">  
        </div>

        </form>

      </div>
    </div>
  </form> 
</div>