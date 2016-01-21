<?php
	ob_start();//new

	if(!isset( $_SESSION['cricket_admin_id'] ) ){
		header('Location: destroySession.php');
	}
?>