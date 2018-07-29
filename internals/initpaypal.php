<?php

	require 'libs/PayPal-PHP-SDK/autoload.php';

	$apiContext = new \PayPal\Rest\ApiContext(
	    new \PayPal\Auth\OAuthTokenCredential(
	        '',     // ClientID
	        ''      // ClientSecret
	    )
	);

?>
