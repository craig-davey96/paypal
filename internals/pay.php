<?php 

	$objCart = new Cart();
	$items = $objCart->itemsArray();

	$n = 0;
	$items_array = array();

	require 'initpaypal.php';

	use PayPal\Api\Amount;
	use PayPal\Api\Details;
	use PayPal\Api\Item;
	use PayPal\Api\ItemList;
	use PayPal\Api\Payer;
	use PayPal\Api\Payment;
	use PayPal\Api\RedirectUrls;
	use PayPal\Api\Transaction;

	$payer = new Payer();
	$payer->setPaymentMethod("paypal");

	$subTotal = array();
	$tax = array();

	$shipping = 0.0;

	foreach ($items as $key) {
		$n++;

		$number = $item.$n;

		$results = $db->fetchOne("SELECT * FROM `products` WHERE `id` = '".$key['id']."'");

		$number = new Item();
		$number->setName($results['name'])
		    ->setCurrency('GBP')
		    ->setQuantity($key['qty'])
		    ->setSku($results['id'])
		    ->setPrice($results['price']);

		$this_tax = $results['price']/100*17.5;

		array_push($subTotal, $results['price']*$key['qty']);
		array_push($tax, $this_tax);
		array_push($items_array , $number);
	}

	$itemList = new ItemList();
	$itemList->setItems($items_array);

	$subTotal = array_sum($subTotal);
	$tax = array_sum($tax);
	$total = $subTotal+$tax;

	$details = new Details();
	$details->setShipping(number_format($shipping , 1))
	    ->setTax($tax)
	    ->setSubtotal($subTotal);

	$amount = new Amount();
	$amount->setCurrency("GBP")
	    ->setTotal($total)
	    ->setDetails($details);

	$transaction = new Transaction();
	$transaction->setAmount($amount)
	    ->setItemList($itemList)
	    ->setDescription("Payment description")
	    ->setInvoiceNumber(uniqid());

	$redirectUrls = new RedirectUrls();
	$redirectUrls->setReturnUrl(URL."payment.php?success=true")
	    ->setCancelUrl(URL."home");

	$payment = new Payment();
	$payment->setIntent("sale")
	    ->setPayer($payer)
	    ->setRedirectUrls($redirectUrls)
	    ->setTransactions([$transaction]);

	$request = clone $payment;

	try {
		$payment->create($apiContext);
	}catch (PayPal\Exception\PayPalConnectionException $ex) {
	    echo $ex->getCode(); // Prints the Error Code
	    echo $ex->getData(); // Prints the detailed error message 
	    die($ex);
	} catch (Exception $ex) {
	    die($ex);
	}

	$approval = $payment->getApprovalLink();

	header('Location:'.$approval);

?>