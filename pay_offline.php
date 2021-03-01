<?php 
include("inc/header.php");
?>
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Payment</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="track-order-page">
			<div class="row">
				<div class="col-md-1">
				</div>
				<div class="col-md-10"><h2 class="heading-title">Items in Your Cart</h2><br />
				<table class="table table-striped">
   
    <tbody>
	
	
      <tr>
        <th>SL No.</th>
        <th>Title</th>
        <th>Image</th>
        <th>Quantity</th>
        <th>Single Price</th>
        <th>Total Price</th>
      </tr>
	  
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
        <td><?php echo$i;?></td>
        <td><?php echo$re['title'];?></td>
        <td><img src="admin/upload/<?php echo$re['image'];?>" alt="" width="70"height="60" /></td>
        <td><?php echo$re['qty'];?></td>
        <td>$<?php echo$re['price'];?></td>
		<?php 
		$single_price=$re['price'];
		$quantity=$re['qty'];
		$total_price=$single_price*$quantity;
		$sum=$sum+$total_price;
		?>
		
        <td>$<?php echo$total_price;?></td>
      </tr>
     <?php 
		}
		}
		else
		{
			echo"<script>window.location='index.php'</script>";
		}
	 ?>
	 <tr> 
	 <td></td>
	 <td></td>
	 <td></td>
	 <td></td>
	 <td><b>Sub Total:</b></td>
	 <td>$
	 <?php
	 echo$sum;
	 $vat=0.025*$sum;
	 //$sum=$sum+$total_price;
	 
	$grand_total=$sum+$vat;
	 ?></td>
	 </tr> 
	 <tr> 
	 <td></td>
	 <td></td>
	 <td></td>
	 <td></td>
	 <td><b>Vat:</b>
	 </td>
	 <td>
	 2%
	</td>
	 </tr>
	 <tr> 
	 <td></td>
	 <td></td>
	 <td></td>
	 <td></td>
	 <td><b>Grand Total:</b></td>
	 <td>$
	 <?php 
	// $sum=$sum+$total_price;
	 //$vat=0.025*$sum;
echo$grand_total;
	 ?></td>
	 </tr>
	 <tr> 
	 <td></td>
	 <td></td>
	 <td></td>
	 <td></td>
	 <td><a href="index.php" class="btn btn-primary">Continue Shopping</a></td>
	 <td><a href="?order" class="btn btn-primary">Order Now</a> </td>
	 </tr>
    </tbody>
  </table>
				

				
				
				<br />
				<br />
				
				
				</div>
				<div class="col-md-1">
				</div>	
				
<?php 

if(isset($_GET['order']) && isset($_SESSION['customer_id']))
	{
	$sid=session_id();
	$cus_id=$_SESSION['customer_id'];
	$q="SELECT * FROM tbl_customer WHERE email='$cus_id'";
	$readData=$obj->selectProducts($q);
	if($readData)
	{
		while($cus_data=$readData->fetch_array())
		{
			$cus_name	=$cus_data['name'];
			$cus_city	=$cus_data['city'];
			$cus_country=$cus_data['country'];
			$cus_address=$cus_data['address'];
			$cus_contact=$cus_data['contact'];
		}
		$q="SELECT * FROM tbl_cart WHERE s_id='$sid'";
		$read_data=$obj->selectProducts($q);
		if($read_data)
		{
		$s=0;
		//$s=0;
		while($result=$read_data->fetch_assoc())
		{
		$proID=$result['pro_id'];
		$proTitle=$result['title'];
		$proImage=$result['image'];
		$proPrice=$result['price'];
		$proQty=$result['qty'];
		$totalPrice=$s+$proPrice*$proQty;
		$vat=$totalPrice*0.025;
		$Total=$totalPrice+$vat;
		//Insert order details into tbl_order table
		$q="INSERT INTO tbl_order (cus_id,pro_id,cus_name,city,country,address,email,contact,pro_title,pro_price,pro_qty,pro_image,payable) VALUES ('$cus_id','$proID','$cus_name','$cus_city','$cus_country','$cus_address','$cus_id','$cus_contact','$proTitle','$proPrice','$proQty','$proImage','$Total')";
		$inserted=$obj->insertCustomerOrder($q);
		//When order has been placed successfully, delete all items from cart for this session 
		$delete_query="DELETE FROM tbl_cart WHERE s_id='$sid'";
		$obj->deleteCategoryItems($delete_query);
		
		}
		if($inserted)
		{
			echo"<script>alert('Thanks!Your order has been placed successfully. We will contact you soon.')</script>";
			echo"<script>window.location='index.php'</script>";
		}
		else
		{
		echo"<script>alert('Something went wrong. Plz try again!')</script>";	
		}
		
		}
		
		
		
	}
	
}

?>				
				
				
				
	
	
						

</div><!-- /.row -->
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