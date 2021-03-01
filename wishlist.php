<?php 
include("inc/header.php");
?>
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Wishlist</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="my-wishlist-page">
			<div class="row">
				<div class="col-md-12 my-wishlist">
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th colspan="4" class="heading-title">My Wishlist</th>
				</tr>
			</thead>
			<tbody>
			
		<?php 
			$ob=new shop();
			$sid=session_id();
			$q="SELECT * FROM tbl_wishlist WHERE s_id='$sid'";
			$item=$ob->selectProducts($q);
			if($item)
			{
			while($re=$item->fetch_array())
			{
		
			
			?>
			
			
				<tr>
					<td class="col-md-2"><img src="admin/upload/<?php echo$re['image'];?>" alt="imga"></td>
					<td class="col-md-7">
						<div class="product-name"><a href="details.php?pro_id=<?php echo$re['pro_id'];?>"><?php echo$re['title'];?></a></div>
						<div class="col-md-3"class="rating">
						
						<?php 
			$pro_id=$re['pro_id'];
			$q="SELECT * FROM tbl_review WHERE pro_id=$pro_id";
			$read_data=$obj->selectReview($q);
			if($read_data)
			{
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
					?>
					<img src='admin/images/1star.jpg' alt="" width='100'height='30'/>
					<?php 
					
				}
				else if($avg=='2') 
				{
					?>
					<img src='admin/images/2stars.jpg' alt="" width='100'height='30'/>
					<?php
				}
				else if($avg=='3')
				{
					?>
					<img src='admin/images/3stars.jpg' alt="" width='100'height='30'/>
					<?php
				}
				else if($avg=='4')
				{
					?>
					<img src='admin/images/4stars.jpg' alt="" width='100'height='30'/>
					<?php
				}
				else if($avg=='0')
				{
					echo"";
				}
				else
				{
					?>
					<img src='admin/images/5stars.jpg' alt="" width='100'height='30'/>
					<?php
				}
			}
			else
			{
				echo"";
			}
			
			if($i=='0')
				
				{
					?>
					<img src='admin/images/3stars.jpg' alt="" width='100'height='30'/>
					<?php
					//echo"no review";
				}
			}
else 
{
	echo"";
}	
				
			
			
			?>
			<?php 
			if(@$i>0)
			{
			?>
			<span class="review">( <?php echo$i;?> Reviews )</span>
			<?php 			
			}
			else
			{
			?>
			<span class="review">( <?php echo$i;?> Review )</span>
			<?php 	
			}
			?>
							
							
						</div>
						<div class="price">
							$<?php echo$re['price'];?>
							<span>$<?php echo$re['prev_price'];?></span>
						</div>
					</td>
					<td class="col-md-2">
						<a href="details.php?pro_id=<?php echo$re['pro_id'];?>" class="btn-upper btn btn-primary">Add to cart</a>
					</td>
					<td class="col-md-1 close-btn">
						<a onclick="return confirm('Are you sure to delete this item?')" href="?del=<?php echo$re['pro_id'];?>" class=""><i class="fa fa-times"></i></a>
					</td>
				</tr>
				
				<?php 
			}
			}
			else
			{
				echo"<script>alert('There is no product in the wishlist')</script>";
				echo"<script>window.location='index.php'</script>";
			}
				?>
				
				
				
				<?php 
							if(isset($_GET['del']))
							{
							$s_id=session_id();
							$obj=new shop();
							$delID=$_GET['del'];
							$q="DELETE FROM tbl_wishlist WHERE pro_id=$delID AND s_id='$s_id'";
							$deleted=$obj->deleteCategoryItems($q);
							if($deleted)
							{
								echo"<script>window.location='wishlist.php'</script>";
							}
							
							
							}
							
							?>
				
			</tbody>
		</table>
	</div>
</div>			</div><!-- /.row -->
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