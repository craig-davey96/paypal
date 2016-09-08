<?php
	
	ob_start("ob_gzhandler");
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	date_default_timezone_set('Europe/London');
	// Include Settings
	include "settings.inc.php";
	include "functions.inc.php";

	defined("DS")
		|| define("DS", DIRECTORY_SEPARATOR);

	// root path
	defined("ROOT_PATH")
		|| define("ROOT_PATH", realpath(dirname(__FILE__) . DS."..".DS));
		
	// classes folder
	defined("CLASSES_DIR")
		|| define("CLASSES_DIR", "classes");


	set_include_path(implode(PATH_SEPARATOR, array(
		realpath(ROOT_PATH.DS.CLASSES_DIR),
		get_include_path()
	)));

	$db  = new Dbase();


?>