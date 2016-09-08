<br clear="all">
<div class="container">
	<?php if(!isset($_SESSION['logged_in'])){ ?>
		<div class="col-md-1"></div>
		<div class="col-md-5">
			<div class="text-center"><h3><strong>Already Registerd? Login.</strong></h3></div>
			<br clear="all">
			<br clear="all">
			<form action="<?=URL?>mods/login.php" method="post">
				<input type="email" name="email" placeholder="Email Address*:" class="form-control">
				<br clear="all">
				<input type="password" name="password" placeholder="Password*:" class="form-control">
				<br clear="all">
				<button name="login" type="submit" class="btn btn-success">LOGIN</button>
			</form>
		</div>
		<div class="col-md-5">
			<div class="text-center"><h3><strong>Not Registered? Register Below.</strong></h3></div>
			<br clear="all">
			<br clear="all">
			<form action="" method="post">
				<input type="text" name="f_name" placeholder="First Name*:" class="form-control">
				<br clear="all">
				<input type="text" name="l_name" placeholder="Last Name*:" class="form-control">
				<br clear="all">
				<input type="email" name="email" placeholder="Email Address*:" class="form-control">
				<br clear="all">
				<input type="password" name="password" placeholder="Password*:" class="form-control">
				<br clear="all">
				<input type="password" name="c_password" placeholder="Confirm Password*:" class="form-control">
				<br clear="all">
				<h4>Address</h4>
				<hr/>
				<input type="text" name="address_line_1" placeholder="Address Line 1:" class="form-control">
				<br clear="all">
				<input type="text" name="address_line_2" placeholder="Address Line 2:" class="form-control">
				<br clear="all">
				<select class="form-control" name="country">
					<option selected disabled>Please Select Country</option>
				</select>
				<br clear="all">
				<input type="text" name="city" placeholder="City:" class="form-control">
				<br clear="all">
				<input type="text" name="county" placeholder="County:" class="form-control">
				<br clear="all">
				<input type="text" name="postcode" placeholder="Post Code:" class="form-control">
				<br clear="all">
				<button name="register" type="submit" class="btn btn-primary">REGISTER</button>
			</form>
		</div>
		<div class="col-md-1"></div>
		<?php 
			}else{ 

				header("Location: ".URL."summary");

			}

		?>
</div>