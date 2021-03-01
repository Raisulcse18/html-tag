<?php 
include("inc/header.php");
?>
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Login</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="sign-in-page">
			<div class="row">
				<!-- Sign-in -->			
<div class="col-md-6 col-sm-6 sign-in">
	<h4 class="">Sign in</h4>
	<p class="">Hello, Welcome to your account.</p>
	<div class="social-sign-in outer-top-xs">
		<a href="http://www.facebook.com" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
		<a href="#" class="twitter-sign-in"><i class="fa fa-twitter"></i> Sign In with Twitter</a>
	</div>
	
	<?php 
	if(isset($_POST['login']))
	{
		$uname=$_POST['email'];
		$pass=$_POST['password'];
		$q="SELECT * FROM tbl_customer WHERE email='$uname' AND password='$pass'";
		$login=$obj->selectAdminData($q);
		if($login)
		{
			echo"<script>alert('Login Successful!');</script>";
			$_SESSION['customer_id']	=$uname;
			$_SESSION['customer_pass']	=$pass;
			
			$sid=session_id();
			$q="SELECT * FROM tbl_cart WHERE s_id='$sid'";
			$read_data=$obj->selectProducts($q);
			if(!$read_data)
			{
			echo"<script>alert('Your cart is empty,Plz buy some product')</script>";
			echo"<script>window.location='index.php'</script>";
			}
			else
			{
			echo"<script>window.location='payment.php'</script>";
			}
			
			//echo"<script>window.location='index.php';</script>";
		}
		else
		{
		echo"<script>alert('Username or password is incorrect!');</script>";
		echo"<script>window.location='sign-in.php';</script>";		
		}
	}
	
	?>
	
	
	<form class="register-form outer-top-xs" role="form" action="" method="POST">
		<div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
		    <input type="email" name="email"class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
		</div>
	  	<div class="form-group">
		    <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
		    <input type="password" name="password"class="password"class="form-control unicase-form-control text-input" id="pwd"id="exampleInputPassword1"  >
			<input type="checkbox"id="showPass" /> Show Password 
		</div>
		
<script type="text/javascript"> 
		function show() {
			var p = document.getElementById('pwd');
			p.setAttribute('type', 'text');
		}

		function hide() {
			var p = document.getElementById('pwd');
			p.setAttribute('type', 'password');
		}

		var pwShown = 0;

		document.getElementById("showPass").addEventListener("click", function () {
			if (pwShown == 0) {
				pwShown = 1;
				show();
			} else {
				pwShown = 0;
				hide();
			}
		}, false);
		
</script>
		
		
		<div class="radio outer-xs">
		  	<label>
		    	<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Remember me!
		  	</label>
		  	<a href="#" class="forgot-password pull-right">Forgot your Password?</a>
		</div>
	  	<button type="submit" name="login"class="btn-upper btn btn-primary checkout-page-button">Login</button>
	</form>					
</div>
<!-- Sign-in -->

<!-- create a new account -->
<div class="col-md-6 col-sm-6 create-new-account">
	<h4 class="checkout-subtitle">Create a new account</h4>
	<p class="text title-tag-line">Create your new account.</p>
	<form class="register-form outer-top-xs" role="form" action="" method="POST">
		<div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
		    <input type="text" name="name"class="form-control unicase-form-control text-input" id="exampleInputEmail1" required>
		</div>
		<div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">City <span>*</span></label>
		    <input type="text" name="city"class="form-control unicase-form-control text-input" id="exampleInputEmail1" required>
		</div>
		<div class="form-group">
		<label class="info-title" for="exampleInputEmail1">Country <span>*</span></label>
		<select name="country" class="form-control"  id=""required>
		<option value="null">Select a Country</option>
		<option value="Bangladesh">Bangladesh</option>
		<option value="Srilanka">Srilanka</option>
		<option value="USA">USA</option>
		<option value="UK">UK</option>
		<option value="Argentina">Argentina</option>
		</select>
		</div>
		<div class="form-group">
		<label class="info-title" for="exampleInputEmail1">Address <span>*</span></label>
		<textarea name="address" id="" class="form-control"cols="30" rows="10"required></textarea>
		</div>
	
		<div class="form-group">
	    	<label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
	    	<input type="email" name="email"class="form-control unicase-form-control text-input" id="exampleInputEmail2" required>
	  	</div>
        
        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Phone Number <span>*</span></label>
		    <input type="text" name="contact"class="form-control unicase-form-control text-input" id="exampleInputEmail1" required>
		</div>
        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Password <span>*</span></label>
		    <input type="password" name="password"class="form-control unicase-form-control text-input" id="pass"id="exampleInputEmail1" required>
		</div>
         <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Confirm Password <span>*</span></label>
		    <input type="password" name="confirmpass"id="confirmpass"class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
		</div>
		<script type="text/javascript"> 
		var password = document.getElementById("pass")
		  , confirm_password = document.getElementById("confirmpass");

		function validatePassword()
		{
		  if(password.value != confirm_password.value) 
		  {
			confirm_password.setCustomValidity("Passwords Don't Match");
		  } 
		  else 
		  {
			confirm_password.setCustomValidity('');
		  }
		}

		password.onchange = validatePassword;
		confirm_password.onkeyup = validatePassword;
		
		</script>
		
		
		
	  	<button type="submit" name="add_customer"class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>
		<button type="reset" class="btn-upper btn btn-primary checkout-page-button">Reset</button>
		
	</form>
	<?php 
	if(isset($_POST['add_customer']))
	{
		$name=$_POST['name'];
		$city=$_POST['city'];
		$country=$_POST['country'];
		$address=$_POST['address'];
		$email=$_POST['email'];
		$contact=$_POST['contact'];
		$pass=$_POST['password'];
		$query="INSERT INTO tbl_customer (name,city,country,address,email,contact,password) VALUES ('$name','$city','$country','$address','$email','$contact','$pass')";
		$inserted=$obj->insertCustomer($query);
		if($inserted)
		{
			echo"<script>alert('Thanks! Your registration successful!')</script>";
		}
		else 
			
		{
			echo"<script>alert('Sorry! Your registration fail! Plz try again')</script>";
		}
	}
	
	?>
	
	
	
</div>	
<!-- create a new account -->			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
<div id="brands-carousel" class="logo-slider wow fadeInUp">

		<div class="logo-slider-inner">	
			<div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
				<div class="item m-t-15">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item m-t-10">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand3.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand6.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->
		    </div><!-- /.owl-carousel #logo-slider -->
		</div><!-- /.logo-slider-inner -->
	
</div><!-- /.logo-slider -->
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->


<?php 
include("inc/footer.php");
?>