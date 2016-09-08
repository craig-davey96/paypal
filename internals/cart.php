<?php

	$objCart = new Cart();
	$cart = $objCart->addCurrentItem($_POST['p_id'] , $_POST['qty']);
	header('Location'.URL."cart");
	$items = $objCart->itemsArray();


	// ADDING ITEMS

	

	// REMOVE ITEMS

	if(isset($_POST['remove'])){

		if(isset($_POST['index_to_remove'])){

			$key = $_POST['index_to_remove'];
		
			if(count($_SESSION['cart_array']) <= 1){
				unset($_SESSION['cart_array']);
			}else{
				unset($_SESSION['cart_array'][$key]);
				sort($_SESSION['cart_array']);
			}

		}

	}

	// AJUST

	// CART VARIABLES

?>

<div class="container">

	<?=$objCart->showCartItems(); ?>

	<div class="row">
		<div class="col-md-8"></div>
		<div class="col-md-4">
			<?php if(!isset($_SESSION['logged_in'])){ ?>
				<a href="<?=URL?>checkout" class="btn btn-success col-md-12">Checkout</a>
			<?php }else{ ?>
				<a href="<?=URL?>summary" class="btn btn-success col-md-12">Checkout</a>
			<?php } ?>
	 	</div>
	</div>

</div>