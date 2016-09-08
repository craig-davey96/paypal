<?php

define("WEBSITE_TITLE" , "ENV Salon");
define("INTERNALS_PATH" , "internals/");
define("SESSION_NAME" , "env_salon");

define("LOCALHOST" , true);

if(LOCALHOST){
	define("URL" , "http://localhost/shopping-cart/");
	define("DB_HOST" , "127.0.0.1");
	define("DB_USER" , "root");
	define("DB_PASS" , "");
	define("DB_NAME" , "shopping-cart");
}else{
	define("URL" , "http://craigdavey.com/apanel-test/");
	define("DB_HOST" , "127.0.0.1");
	define("DB_USER" , "severity1234");
	define("DB_PASS" , "Squid1996");
	define("DB_NAME" , "new-admin");
}

if($admin = true){
	define("ADMIN_CONTROLLER_PATH" , "controllers/");	
}

define("FAVICON_LOCATION" , URL . "favicon.png");

define("ADMIN_URL" , URL . "admin/");

?>