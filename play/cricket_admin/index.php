<?php
	require 'mask.php';
	if(isset( $_SESSION['cricket_admin_id'] ) ){
		Header('Location: adminPanel.php');
	}else{
		Header('Location: adminLogin.php');
	}
?>