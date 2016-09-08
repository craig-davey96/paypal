<?php 
	
	require "initpaypal.php";

	use PayPal\Api\Payment;
	use PayPal\Api\PaymentExecution;

	$paymentID = $_GET['paymentId'];
	$payerID = $_GET['PayerID'];

	$payment = Payment::get($paymentID , $apiContext);

	$execute = new PaymentExecution();
	$execute->setPayerId($payerID);

	try{

		$result = $payment->execute($execute , $apiContext);

	} catch(Exception $e){
		die($e);
	}


?>