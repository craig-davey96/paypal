<?php

	require 'libs/PayPal-PHP-SDK/autoload.php';

	$apiContext = new \PayPal\Rest\ApiContext(
	    new \PayPal\Auth\OAuthTokenCredential(
	        'AT3R4bWmjIABm-f2SuuwdE1RqIj3_O2NkgSLHSD4Eckq4Yk4Q3f7Nx4QOIhqEskjJ3fc-iAyCXURyeJs',     // ClientID
	        'EKB6MQ53YULqjGRzDAhpNv2RBGkvO5jFUWgwaV49L5iA99VvCg0dqbh8KakczdBb03ctAC9rVpIcI7N4'      // ClientSecret
	    )
	);

?>