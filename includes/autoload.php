<?php

	if(!isset($_SESSION)){

		session_start();
	}

	function __autoload($class_name) {
		$class = explode("_", $class_name);
		$path = implode("/", $class).".php";
		require_once($path);
	}

?>