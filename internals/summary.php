<?php 

	$objCart = new Cart();
	$items = $objCart->itemsArray();
	
?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<?=$objCart->showSummary();?>

			<div class="row">
				<div class="col-md-6">
				</div>
				<div class="col-md-6">
					
					<br clear="all">
					<br clear="all">
					<a href="<?=URL?>pay" class="btn btn-success col-md-12">Check Out With Paypal</a>
					<a href="<?=URL?>cart" class="btn btn-primary col-md-12">Edit your cart</a>
				</div>
			</div>
		</div>
	</div>
</div>