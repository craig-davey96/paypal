<?php

	include '../includes/autoload.php';
	include '../includes/config.php';

	unset($_SESSION['logged_in']);
	header("Location:" . $_SERVER['HTTP_REFERER']);

?>