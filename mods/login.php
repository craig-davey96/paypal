<?php

	include '../includes/autoload.php';
	include '../includes/config.php';

	if(isset($_POST['login'])){

		$email = $db->escape($_POST['email']);
		$password = $db->escape($_POST['password']);

		$find = $db->fetchALL("SELECT * FROM `admins` WHERE `email` = '".$email."'");
		$count = $db->count($find);

		if($count = 1){

			$password = password_hash($password , PASSWORD_DEFAULT);

			$find = $db->fetchALL("SELECT * FROM `admins` WHERE `email` = '".$email."' AND `password` = '".$password."'");
			$count = $db->count($find);

			if($count = 1){

				$_SESSION['logged_in'] = serialize($email);
				header("Location:" . $_SERVER['HTTP_REFERER']);

			}

		}

	}

?>