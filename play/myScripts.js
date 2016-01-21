function goToByScroll(id){
      // Remove "link" from the ID
    id = id.replace("link", "");
      // Scroll
    $('html,body').animate({
        scrollTop: $("#"+id).offset().top-70},
        'slow');
}


function loginButtonPressed(){
	//alert("Login Button Pressed.");
	if($("#email").val()==="" || $("#password").val()===""){
	    bootbox.alert("Fields cannot be empty.", function() {
		});
	}else{
		$("#loginSubmitButton").trigger('click');
	}
}

function isInt(n) {
   return n % 1 === 0;
}

function checkContact(x){
	//alert(x);
	
	if(!isInt(x)){
		return true;
	}	
	else if(x.length===11){
		return false;
	}
	else {
		return true;
	}
}

function checkPassword(x){
	if(x.length>=6){
		return false;
	}else{
		return true;
	}
}

function registerButtonPressed () {
	
	//alert("Register Button Pressed.");
	if($("#register_username").val()==="" || $("#register_email").val()==="" || $("#register_password").val()==="" || $("#re_password").val()==="" || $("#register_mobile")==="" || $("#register_age")===""){
	    bootbox.alert("Fields cannot be empty.", function() {
		});
	}else if(!validateEmail($("#register_email").val())){
		bootbox.alert("Please enter a valid email address.", function() {
			document.getElementById('register_email').value="";
		});
	}else if(!isInt($("#register_age").val())){
		bootbox.alert("Please enter a valid age.", function() {
			document.getElementById('register_age').value="";
		});
	}else if($("#register_password").val()!==$("#re_password").val()){
		bootbox.alert("Passwords do not match.", function() {
			document.getElementById('register_password').value="";
			document.getElementById('re_password').value="";
		});
	}else if(checkPassword($("#register_password").val())){
		bootbox.alert("Passwords must contain at least 6 digits", function() {
			document.getElementById('register_password').value="";
			document.getElementById('re_password').value="";
		});
	}else if(checkContact($("#register_mobile").val())){
		bootbox.alert("Please enter a valid mobile number of 11 digit.", function() {
			document.getElementById('register_mobile').value="";
		});
	}else{
		$("#registerSubmitButton").trigger('click');
	}
}

function validateEmail($email) {
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  if( !emailReg.test( $email ) ) {
    return false;
  } else {
    return true;
  }
}


function logOutButtonPressed(){
	bootbox.confirm("Are you sure you want to log out?", function(result) {
		if(result){
			document.location.href="destroySession.php";
		}
	}); 
}


function updateInformationButtonPressed(){
	if(checkContact($("#updateMobile").val())){
		bootbox.alert("Please enter a valid mobile number of 11 digit.", function() {
			document.getElementById('updateMobile').value="";
		});
	}else if(!isInt($("#updateAge").val())){
		bootbox.alert("Please enter a valid age.", function() {
			document.getElementById('updateAge').value="";
		});
	}else{
		bootbox.confirm("Are you sure you update your information?", function(result) {
			if(result){
				$("#updateInformationSubmitButton").trigger('click');
			}
		}); 	
	}
	
}

function selectSquad(id){
	document.getElementById("squadSelectionDiv").style.display = "block";
	showPlayers(id);
	goToByScroll('squadSelectionDiv');
}


/* Player selection process; very tough */
limit=6;
function limitTeam1(oCheckbox) 
{
	var el, i = 0, n = limit, oForm = oCheckbox.form;
	while (el = oForm.elements[i++])
	{
		if (el.className == 'team1List' && el.checked)
			--n;
		if (n < 0)
		{
			alert('You can select maximum '+limit+' players from a team.');			
			return false;
		}
	}
	//insertUserPlayer(playerId,matchId,userId);	
	return true;
}

function limitTeam2(oCheckbox) 
{
	var el, i = 0, n = limit, oForm = oCheckbox.form;
	while (el = oForm.elements[i++])
	{
		if (el.className == 'team2List' && el.checked)
			--n;
		if (n < 0)
		{
			alert('You can select maximum '+limit+' players from a team.');
			return false;
		}
	}
	return true;
}
maxLimit=11;
function submitUserTeam(matchId){
	//alert(id);
	//document.getElementById("squadSelectionDiv").style.display = "none";
	count=0;
	$("input[type=checkbox]:checked").each(function() {
	    //alert( $(this).val() );
	    count++;
	});
	if(count!==maxLimit){
		alert("Please select "+maxLimit+" players.\nYou  selected only "+count+" players.");
	}else{
		$("input[type=checkbox]:checked").each(function() {
		    playerId=$(this).val();
		    insertPlayer(playerId,matchId);
		});
		location.reload();
		goToByScroll('top');
	}
}
/* Player selection process ends */

function showTeamPlayers(id){
	//alert(id);
	reloadPlayers(id);
	goToByScroll('teamPlayersDiv');
}

