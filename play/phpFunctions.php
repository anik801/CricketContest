<?php
	ob_start();//new
	if(isset($_POST['registerSubmitButton'])){
		$username=mysql_real_escape_string($_POST['register_username']);
		$email=mysql_real_escape_string($_POST['register_email']);
		$password=mysql_real_escape_string($_POST['register_password']);
		$mobile=mysql_real_escape_string($_POST['register_mobile']);
		$age=mysql_real_escape_string($_POST['register_age']);
		$gender=mysql_real_escape_string($_POST['gender']);

		$email_en=md5($email);
		$password_en=md5($password);		

		$sql="SELECT id FROM user_accounts WHERE email_en='$email_en' ";
		$result=mysql_query($sql);
		if (!$result) {
		    die('Invalid query: ' . mysql_error());
		}else{			
			if(mysql_num_rows($result)){
				echo "
					<script>
					alert('This email is already registered. Please log in to continue.');
					document.location.href='';
					</script>
					";
			}
			else{
				$sql="INSERT INTO user_accounts (name,contact,age,gender,email,password,email_en,password_en,user_date_time) VALUES ('$username','$mobile','$age','$gender','$email','$password','$email_en','$password_en',now())";

				$result=mysql_query($sql);
				if (!$result) {
				    die('Invalid query: ' . mysql_error());
				}else{			
					echo "
						<script>
						alert('Registration Succesful. Please login to continue.');
						document.location.href='';
						</script>
						";
				}
			}
		}		
	}else if(isset($_POST['loginSubmitButton'])){

		$un=mysql_real_escape_string($_POST['email']);
		$pw=mysql_real_escape_string($_POST['password']);
		$un=md5($un);
		$pw=md5($pw);
		
		$sql="SELECT id FROM `user_accounts` WHERE `email_en`='$un' AND `password_en`='$pw'";
		$result=mysql_query($sql);
		if (!$result) {
		   	die('Invalid query: ' . mysql_error());
		 	break;
		}
		if(mysql_num_rows($result)>0){
			$row=mysql_fetch_array($result);
			$_SESSION['cricket_user_id']=$row['id'];
			header('Location: index.php');
			exit();//new
		}else{
			echo "<script>alert('Authentication Error.');</script>";
		}
		
	}else if(isset($_POST['contactUsSubmitButton'])){
		$name=mysql_real_escape_string($_POST['contactName']);
		$email=mysql_real_escape_string($_POST['contactEmail']);
		$contactDescription=mysql_real_escape_string($_POST['contactDescription']);

		$sql="INSERT INTO messages (sender_name,sender_email,message_description,message_date_time) VALUES ('$name','$email','$contactDescription',now())";
		$result=mysql_query($sql);
		if (!$result) {
		    die('Invalid query: ' . mysql_error());
		}else{			
			echo "
				<script>
				alert('Your message has been succesfullly sent. Check your mailbox for our reply.');
				document.location.href='';
				</script>
				";
		}
	}else if(isset($_POST['updateInformationSubmitButton'])){

		$name=mysql_real_escape_string($_POST['updateUsername']);
		$contact=mysql_real_escape_string($_POST['updateMobile']);
		$age=mysql_real_escape_string($_POST['updateAge']);
		$gender=mysql_real_escape_string($_POST['updateGender']);
		$userId=$_SESSION['cricket_user_id'];
		$sql="UPDATE user_accounts set name='$name', contact='$contact', age='$age', gender='$gender' WHERE id='$userId' ";
		$result=mysql_query($sql);
		if (!$result) {
		    die('Invalid query: ' . mysql_error());
		}else{			
			echo "
				<script>
				alert('Your information has been succesfullly updated.');
				document.location.href='';
				</script>
				";
		}
	}

?>

