<?php
	if(isset($_SESSION['cart_array'])){
		$cart_count = count($_SESSION['cart_array']);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link href='https://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="<?=URL?>css/styles.css">
</head>
<body>
<div class="container">
	
	<br clear="all">
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">
	        Shopping Cart
	      </a>
	    </div>

	    <ul class="nav navbar-nav navbar-left">
	        <li><a href="<?=URL?>home">Home</a></li>
	    </ul>
	    <ul class="nav navbar-nav navbar-right">
	        <li><a href="<?=URL?>cart">Cart(<?=(isset($cart_count)) ? $cart_count : "0" ?>)</a></li>
	        <?php if(!isset($_SESSION['logged_in'])){ ?>
	    		<li><button type="button" class="btn btn-success navbar-btn" data-toggle="modal" data-target="#myModal">Log In</button> &#160;</li>
	    	<?php }else{ ?>
	    		<li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Account <span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li><a href="#">My Orders</a></li>
		            <li><a href="#">My Details</a></li>
		            <li role="separator" class="divider"></li>
		            <li><a href="<?=URL?>mods/logout.php">Logout</a></li>
		          </ul>
		        </li>
	    	<?php } ?>
	    </ul>

	  </div>
	</nav>

</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
	    <form action="<?=URL?>mods/login.php" method="post">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Login</h4>
	      </div>
	      <div class="modal-body">
	        <input type="email" name="email" placeholder="Email Address*:" class="form-control">
	        <br clear="all">
	        <input type="password" name="password" placeholder="Password*:" class="form-control">
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" name="login" class="btn btn-success">Login</button>
	      </div>
	    </form>
    </div>
  </div>
</div>