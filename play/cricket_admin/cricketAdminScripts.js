function logOutButtonPressed(){
	bootbox.confirm("Are you sure you want to log out?", function(result) {
		if(result){
			document.location.href="destroySession.php";
		}
	}); 
}

function updateInformationButtonPressed(x){
	if($("#newPassword").val()!==$("#newPasswordRe").val() && $("#newPassword").val()!==""){
		alert("Please check new password.");
		document.getElementById('newPassword').value="";
		document.getElementById('newPasswordRe').value="";
	}else{
		$("#updateInformationSubmitButton").trigger('click');
	}
}

function fileCheck(obj,id) {
    var fileExtension = ['jpeg', 'jpg', 'png', 'bmp'];
    if ($.inArray($(obj).val().split('.').pop().toLowerCase(), fileExtension) == -1){
        alert("Only '.jpeg','.jpg', '.png', '.bmp' formats are allowed.");
        destroyImageInputValue(id);
    }
}

function destroyImageInputValue(x){
	document.getElementById(x).value = '';
}

function deleteTeamButtonClicked(x){
	bootbox.confirm("Are you sure you want to delete this team and all it's players? Once done, it cannot be undone.", function(result) {
		if(result){
			document.location.href="deleteTeam.php?id="+x;
		}
	}); 
}

function deletePlayerButtonClicked(x){
	bootbox.confirm("Are you sure you want to delete this player? Once done, it cannot be undone.", function(result) {
		if(result){
			document.location.href="deletePlayer.php?id="+x;
		}
	}); 
}

function createMatchSubmitButtonPressed(){
	team1=document.getElementById("team1").value;
	team2=document.getElementById("team2").value;
	if(team1==='0' || team2==='0'){
		alert("Please select both teams.");
	}else if(team1===team2){
		alert("Please select two different teams.");
	}else{
		$("#createMatchSubmitButton").trigger('click');
	}
}

function deleteMatchButtonClicked(x){
	bootbox.confirm("Are you sure you want to delete this match? Once done, it cannot be undone.", function(result) {
		if(result){
			document.location.href="deleteMatch.php?id="+x;
		}
	}); 
}

function deleteSponsorButtonClicked(x){
	bootbox.confirm("Are you sure you want to delete this sponsor? Once done, it cannot be undone.", function(result) {
		if(result){
			document.location.href="deleteSponsor.php?id="+x;
		}
	}); 
}
