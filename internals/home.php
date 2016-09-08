<?php 

	$objProduct = new Products();
	$products = $objProduct->getProducts();

?>
<div class="container">
	<div class="row">

	<?php foreach ($products as $product) { ?>

	  <div class="col-sm-6 col-md-4">
	    <div class="thumbnail">
	      <?php if(!empty($product['image'])){ ?>
	      	<img src="<?=URL?>images/<?=$product['image']?>">
	      <?php }else{ ?>
	      	<img src="<?=URL?>images/un.jpg">
	      <?php } ?>
	      <div class="caption">
	        <h3><?=$product['name']?></h3>
	        <p>&pound;<?=number_format($product['price'] , 2)?></p>
	        <form action="<?=URL?>cart" method="post">
	        	<input type="hidden" name="p_id" value="<?=$product['id']?>">
	        	<hr/>
	        	<label>QTY</label>
	        	<select name="qty" class="form-control">
	        		<option value="1">1</option>
	        		<option value="2">2</option>
	        		<option value="3">3</option>
	        		<option value="4">4</option>
	        		<option value="5">5</option>
	        	</select>
	        	<hr/>
	        	<p><button type="submit" name="add_to_cart" class="btn btn-primary">Add To Cart</button></p>
	        </form>
	      </div>
	    </div>
	  </div>

	<?php } ?>


	</div>



</div>