<?php	
	include 'includes/autoload.php';
	include 'includes/config.php';
	 	
	if (isset($_GET['params'])) {
		$params = explode("/", $_GET['params']);
		$page = cleanPageInput(array_shift($params));
	} else {
		$page = "home";
	}

	if(!isset($_SESSION['location_selection'])){
		//$page = "landing";
	}
	
	$pageName = $page;
	
	$pageDir = "internals/";
	$pageFile = $pageDir . "/$page.php";
	
	if (file_exists($pageFile)) {
		ob_start();
		require "$pageFile";
		$pageHtml = ob_get_clean();
		require "sections/header.php";
		echo $pageHtml;
		require "sections/footer.php";
	} else {
		if (file_exists("$page.php")) {
			require($page . ".php");
		} else {
			require "sections/header.php";
			require $pageDir . "errors/404.php";
			require "sections/footer.php";
		}
	}
	
?>