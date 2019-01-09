<?php
session_start();
require_once('../models/User.php');
	$session_user_id=0;
	$session_user_type;
	$session_user_email;
	$session_user_name;
	// there is an admin value in session
	if(isset($_SESSION["session_user_email"]) && isset($_SESSION["session_user_passwd"])){
		$session_user_email		= $_SESSION["session_user_email"];
		$session_user_password	= $_SESSION["session_user_passwd"];
		// check user and password
		$crypt_pass = User::encryptPassword($session_user_password);
    	$result     = User::checkLogin($session_user_email,$crypt_pass);
    	$row        = mysql_fetch_array($result);
		if(isset($row['id'])){
			// check online session
			$user_type 	= $row['type'];
			if($user_type == "admin"){
				$session_user_id 	= (int)$row['id'];
				$session_user_name	= $row['name'];
				$session_user_email	= $row['email'];
				$session_user_type	= $row['type'];
			}
		}
	}
	// check login
	if(!isset($session_user_id) || $session_user_id ==0){
		header("Location: ../login.php");
	}
?>