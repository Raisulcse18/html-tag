<?php 
include("inc/header.php");

?>
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Shopping Cart</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-xs">
	<div class="container">
		<div class="row ">
			<div class="shopping-cart">
				<div class="shopping-cart-table ">
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th class="cart-romove item">Remove</th>
					<th class="cart-description item">Image</th>
					<th class="cart-product-name item">Product Name</th>
					<!--<th class="cart-edit item">Edit</th>-->
					<th class="cart-qty item">Quantity</th>
					<th class="cart-sub-total item">Price</th>
					<th class="cart-total last-item">Total Price</th>
				</tr>
			</thead><!-- /thead -->
			<tfoot>
				<tr>
					<td colspan="7">
						<div class="shopping-cart-btn">
							<span class="">
								<a href="index.php" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>
								
							</span>
						</div><!-- /.shopping-cart-btn -->
					</td>
				</tr>
			</tfoot>
			<tbody>
			<?php 
						$ob=new shop();
						$sid=session_id();
						$q="SELECT * FROM tbl_cart WHERE s_id='$sid'";
						$sub_total=0;
						$item=$ob->selectProducts($q);
						if($item)
						{
						$sum=0;	
						$i=0;
						while($re=$item->fetch_array())
						{
						$i++;
						
						?>
			
			
				<tr>
					<td class="romove-item"><a onclick="return confirm('Are you sure to delete this item?')"href="?del=<?php echo$re['pro_id'];?>" title="cancel" class="icon"><i class="fa fa-trash-o"></i></a></td>
					<td class="cart-image">
						<a class="entry-thumbnail" href="detail.html">
						    <img src="admin/upload/<?php echo$re['image'];?>" alt="">
						</a>
					</td>
					<td class="cart-product-name-info">
						<h4 class='cart-product-description'><a href="detail.html"><?php echo$re['title'];?></a></h4>
						<div class="row">
							<div class="col-sm-4">
								<div class="rating rateit-small"></div>
								<?php 
										$pro_id=$re['pro_id'];
										$q="SELECT * FROM tbl_review WHERE pro_id=$pro_id";
										$read_data=$obj->selectReview($q);
										$p=0;
										$q=0;
										$v=0;
										$i=0;
										while($rr=$read_data->fetch_array())
										{
											$i++;
											$p=$p+$rr['price'];
											$q=$q+$rr['quality'];
											$v=$v+$rr['value'];
											//$count=$i;
										
											
										}
										if(!$i=='0')
										{
										$avg=ceil((@$p+@$q+@$v)/(3*$i));
											if($avg=='1')
											{
												echo"1 star";
											}
											else if($avg=='2') 
											{
												echo"2 Stars";
											}
											else if($avg=='3')
											{
												echo"3 Stars";
											}
											else if($avg=='4')
											{
												echo"4 Stars";
											}
											else if($avg=='0')
											{
												echo"";
											}
											else
											{
												echo"5 Stars";
											}
										}
										else
										{
											echo"";
										}
										
										if($i=='0')
											
											{
												echo"no review";
											}
											
											
										
										
										?>
								
							</div>
							<div class="col-sm-8">
								<div class="reviews">
									(<?php echo$i;?> Reviews)
								</div>
							</div>
						</div><!-- /.row -->
						<div class="cart-product-info">
											<span class="product-color">COLOR:<span>red</span></span>
						</div>
					</td>
					<form action="" method="post">
					<td class="cart-product-quantity">
						<div class="quant-input">
				                <div class="arrows">
				                  <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
				                  <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
				                </div>
				                <input type="text" name="quantity"value="<?php echo$re['qty'];?>">
								
			              </div>
						  <input type="hidden"name="upID"value="<?php echo$re['pro_id'];?>" />
						  <input type="submit" class="btn btn-primary"name="update"value="Update" />
		            </td>
					</form>
					<td class="cart-product-sub-total"><span class="cart-sub-total-price">
					
					$<?php echo$re['price'];?>.00</span></td>
					<td class="cart-product-grand-total"><span class="cart-grand-total-price">
					<?php
					$single_price=$re['price'];
					$quantity=$re['qty'];
					$total_price=$single_price*$quantity;
					?>
					$<?php echo$total_price;?>.00</span></td>
					<?php 
					$sum=$sum+$total_price;
					?>
				</tr>
				<?php 
				
						}
						}
						else
						{
							echo"<script>alert('Cart is empty! Plz buy some product')</script>";
							echo"<script>window.location='index.php'</script>";
						}
				?>
				
				
				
			</tbody><!-- /tbody -->
		</table><!-- /table -->
	</div>
</div><!-- /.shopping-cart-table -->	
						<?php 
							if(isset($_GET['del']))
							{
								$s_id=session_id();
							$obj=new shop();
							$delID=$_GET['del'];
							$q="DELETE FROM tbl_cart WHERE pro_id=$delID AND s_id='$s_id'";
							$deleted=$obj->deleteCategoryItems($q);
							if($deleted)
							{
								echo"<script>window.location='cart.php'</script>";
							}
							
							
							}
							
							?>
						<?php 
							if(isset($_POST['update']))
							{
							$obj=new shop();
							$s_id=session_id();
							$qty=$_POST['quantity'];
							$updateID=$_POST['upID'];
							$q="UPDATE tbl_cart SET qty=$qty WHERE pro_id=$updateID AND s_id='$s_id'";
							$updated=$obj->updateCategoryItems($q);
							if($updated)
							{
								echo"<script>window.location='cart.php'</script>";
							}
							}
							?>



			<div class="col-md-4 col-sm-12 estimate-ship-tax">
	<table class="table">
		<thead>
			<tr>
				<th>
					<span class="estimate-title">Estimate shipping and tax</span>
					<p>Enter your destination to get shipping and tax.</p>
				</th>
			</tr>
		</thead><!-- /thead -->
		<tbody>
				<tr>
					<td>
						<div class="form-group">
							<label class="info-title control-label">Country <span>*</span></label>
							<select class="form-control unicase-form-control selectpicker">
								<option>--Select options--</option>
								<option>India</option>
								<option>SriLanka</option>
								<option>united kingdom</option>
								<option>saudi arabia</option>
								<option>united arab emirates</option>
							</select>
						</div>
						<div class="form-group">
							<label class="info-title control-label">State/Province <span>*</span></label>
							<select class="form-control unicase-form-control selectpicker">
								<option>--Select options--</option>
								<option>TamilNadu</option>
								<option>Kerala</option>
								<option>Andhra Pradesh</option>
								<option>Karnataka</option>
								<option>Madhya Pradesh</option>
							</select>
						</div>
						<div class="form-group">
							<label class="info-title control-label">Zip/Postal Code</label>
							<input type="text" class="form-control unicase-form-control text-input" placeholder="">
						</div>
						<div class="pull-right">
							<button type="submit" class="btn-upper btn btn-primary">GET A QOUTE</button>
						</div>
					</td>
				</tr>
		</tbody>
	</table>
</div><!-- /.estimate-ship-tax -->

<div class="col-md-4 col-sm-12 estimate-ship-tax">
	<table class="table">
		<thead>
			<tr>
				<th>
					<span class="estimate-title">Discount Code</span>
					<p>Enter your coupon code if you have one..</p>
				</th>
			</tr>
		</thead>
		<tbody>
				<tr>
					<td>
						<div class="form-group">
							<input type="text" class="form-control unicase-form-control text-input" placeholder="You Coupon..">
						</div>
						<div class="clearfix pull-right">
							<button type="submit" class="btn-upper btn btn-primary">APPLY COUPON</button>
						</div>
					</td>
				</tr>
		</tbody><!-- /tbody -->
	</table><!-- /table -->
</div><!-- /.estimate-ship-tax -->

<div class="col-md-4 col-sm-12 cart-shopping-total">
	<table class="table">
		<thead>
			<tr>
				<th>
					<div class="cart-sub-total">
						Subtotal<span class="inner-left-md">$<?php echo$sum;?>.00</span>
					</div>
					<div class="cart-sub-total">
						Vat<span class="inner-left-md">2.5%</span>
					</div>
					<div class="cart-grand-total">
					<?php 
					$vat=0.025*$sum;
					
					$grand_total=$sum+$vat;
					?>
						Grand Total<span class="inner-left-md">$<?php echo $grand_total;?></span>
					</div>
				</th>
			</tr>
		</thead><!-- /thead -->
		<tbody>
				<tr>
					<td>
					
					<?php 
				   if(!isset($_SESSION['customer_id']))
				  
				   {
					   /* echo"<script>alert('Plz sign-up first for proceding to checkout')</script>"; */
					?>
						<div class="cart-checkout-btn pull-right">
							<a href="sign-in.php"><button type="submit" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</button></a>
							<span class="">Checkout with multiples address!</span>
						</div>
						<?php 
				   }
				   else
				   {
				  
						   ?>
						   <div class="cart-checkout-btn pull-right">
							<a href="payment.php"><button type="submit" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</button></a>
							<span class="">Checkout with multiples address!</span>
						</div>
						  <?php 
				   }
						  ?>
						
					</td>
				</tr>
		</tbody><!-- /tbody -->
	</table><!-- /table -->
</div><!-- /.cart-shopping-total -->			</div><!-- /.shopping-cart -->
		</div> <!-- /.row -->
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