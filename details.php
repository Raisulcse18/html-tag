<?php include("inc/header.php");?>
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li><a href="#">Clothing</a></li>
				<li class='active'>Floral Print Buttoned</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row single-product'>
			<div class='col-md-3 sidebar'>
				<div class="sidebar-module-container">
				
				<?php include("inc/detail_sidebar.php");?>
				
				
				
				
				
    
<!-- ============================================== Testimonials: END ============================================== -->

 

				</div>
			</div><!-- /.sidebar -->
			
		<?php 
			if(!isset($_GET['pro_id']))
			{
				//header("Location: 404.php");
				echo"<script>window.location='404.php';</script>";
			}
			else
				
			{
				$pro_id=$_GET['pro_id'];
				$query="SELECT * FROM tbl_products WHERE id=$pro_id";
				$read_item=$obj->selectProducts($query);
				if($r=$read_item->fetch_array())
				{
				?>
			
			
			
			<div class='col-md-9'>
            <div class="detail-block">
				<div class="row  wow fadeInUp">
                
					     <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
    <div class="product-item-holder size-big single-product-gallery small-gallery">

        <div id="owl-single-product">
            <div class="single-product-gallery-item" id="slide1">
                <a data-lightbox="image-1" data-title="Gallery" href="admin/upload/<?php echo$r['image'];?>">
                    <img class="img-responsive" alt="" src="assets/images/blank.gif" data-echo="admin/upload/<?php echo$r['image'];?>" />
                </a>
            </div><!-- /.single-product-gallery-item -->
			<?php 
			$sameitem=$r['subcategoryitem'];
			$q="SELECT * FROM tbl_products WHERE subcategoryitem='$sameitem' ORDER BY id DESC LIMIT 4";
			$data=$obj->selectProducts($q);
			$i=1;
			while($img=$data->fetch_array())
			{
			$i++;
			?>
			
			
            <div class="single-product-gallery-item" id="slide<?php echo$i;?>">
                <a data-lightbox="image-1" data-title="Gallery" href="admin/upload/<?php echo $img['image'];?>">
                    <img class="img-responsive" alt="" src="assets/images/blank.gif" data-echo="admin/upload/<?php echo $img['image'];?>" />
                </a>
            </div><!-- /.single-product-gallery-item -->
			<?php 
			}
			?>

            

        </div><!-- /.single-product-slider -->


        <div class="single-product-gallery-thumbs gallery-thumbs">

            <div id="owl-single-product-thumbnails">
			<?php 
			$sameitem=$r['subcategoryitem'];
			$q="SELECT * FROM tbl_products WHERE subcategoryitem='$sameitem' ORDER BY id DESC LIMIT 4";
			$data=$obj->selectProducts($q);
			$i=0;
			while($img=$data->fetch_array())
			{
			$i++;
			?>
			
			
                <div class="item">
                    <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide<?php echo$i;?>">
                        <img class="img-responsive" width="85" alt="" src="assets/images/blank.gif" data-echo="admin/upload/<?php echo$img['image'];?>" />
                    </a>
                </div>

				<?php 
			}
				?>
				
                
            </div><!-- /#owl-single-product-thumbnails -->

            

        </div><!-- /.gallery-thumbs -->

    </div><!-- /.single-product-gallery -->
</div><!-- /.gallery-holder -->  

			
				

      			
					<div class='col-sm-6 col-md-7 product-info-block'>
						<div class="product-info">
							<h1 class="name"><?php echo$r['title'];?></h1>
							
							<div class="rating-reviews m-t-20">
								<div class="row">
									<div class="col-sm-3">
										
										<?php 
										$pro_id=$r['id'];
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
											<a href="#" class="lnk">(<?php echo$i;?> Reviews)</a>
										</div>
									</div>
								</div><!-- /.row -->		
							</div><!-- /.rating-reviews -->

							<div class="stock-container info-container m-t-10">
								<div class="row">
									<div class="col-sm-2">
										<div class="stock-box">
											<span class="label">Availability :</span>
										</div>	
									</div>
									<div class="col-sm-9">
										<div class="stock-box">
											<span class="value"><?php echo$r['availability'];?></span>
										</div>	
									</div>
								</div><!-- /.row -->	
							</div><!-- /.stock-container -->

							<div class="description-container m-t-20">
								<?php echo stripcslashes($r['description']);?>
							</div><!-- /.description-container -->

							<div class="price-container info-container m-t-20">
								<div class="row">
									

									<div class="col-sm-6">
										<div class="price-box">
											<span class="price">$<?php echo$r['price'];?>.00</span>
											<span class="price-strike">$<?php echo$r['prev_price'];?>.00</span>
										</div>
									</div>

									<div class="col-sm-6">
										<div class="favorite-button m-t-10">
											<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Wishlist" href="#">
											    <i class="fa fa-heart"></i>
											</a>
											<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Add to Compare" href="#">
											   <i class="fa fa-signal"></i>
											</a>
											<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="E-mail" href="#">
											    <i class="fa fa-envelope"></i>
											</a>
										</div>
									</div>

								</div><!-- /.row -->
							</div><!-- /.price-container -->

							<div class="quantity-container info-container">
								<div class="row">
									
									<div class="col-sm-2">
										<span class="label">Qty :</span>
									</div>
							<form action="" method="POST">
									
									<div class="col-sm-2">
										<div class="cart-quantity">
											<div class="quant-input">
								                <div class="arrows">
								                  <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
								                  <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
								                </div>
								                <input type="text" name="qty"value="1">
							              </div>
							            </div>
									</div>

									<div class="col-sm-7">
										
										<input type="submit" class="btn btn-primary"name="add_cart" value="ADD TO CART"/>
									</div>
							</form>
							
							<?php 
							if(isset($_POST['add_cart']))
							{
								$pro_id		=$r['id'];
								$s_id		=session_id();
								$pro_title	=$r['title'];
								$pro_image	=$r['image'];
								$pro_price	=$r['price'];
								$pro_qty	=$_POST['qty'];
								
								$q="SELECT * FROM tbl_cart WHERE pro_id=$pro_id AND s_id='$s_id'";
								$check_pro=$obj->selectProducts($q);
								if($check_pro)
								{
									echo"<script>alert('This product is already added to cart. Plz buy another product.')</script>";
									echo"<script>window.location='index.php'</script>";
								}
								else
								{
								
								$q="INSERT INTO tbl_cart (s_id,pro_id,title,image,price,qty) VALUES('$s_id','$pro_id','$pro_title','$pro_image','$pro_price','$pro_qty')";
								$inserted=$obj->insertProduct($q);
								if($inserted)
								{
								echo"<script>alert('Product Added to cart Successfully!')</script>";
									//echo"<script>window.location='index.php'</script>";	
								}
								else
								{
								echo"<script>alert('Sorry! Product not Added to cart. Plz Try again.')</script>";	
								}
								}
							}
							
							?>
							
							
							
							
							
									
								</div><!-- /.row -->
							</div><!-- /.quantity-container -->

							

							

							
						</div><!-- /.product-info -->
					</div><!-- /.col-sm-7 -->
				</div><!-- /.row -->
                </div>
				
				<div class="product-tabs inner-bottom-xs  wow fadeInUp">
					<div class="row">
						<div class="col-sm-3">
							<ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
								<li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
								<li><a data-toggle="tab" href="#review">REVIEW</a></li>
								<li><a data-toggle="tab" href="#tags">TAGS</a></li>
							</ul><!-- /.nav-tabs #product-tabs -->
						</div>
						<div class="col-sm-9">

							<div class="tab-content">
								
								<div id="description" class="tab-pane in active">
									<div class="product-tab">
										<p class="text">
										
										<?php echo$r['description'];?>
										
										</p>
									</div>	
								</div><!-- /.tab-pane -->

								<div id="review" class="tab-pane">
									<div class="product-tab">
									
										


										
										
										<div class="product-reviews">
											<h4 class="title">Customer Reviews</h4>
											<?php 
										
										$sqli="SELECT * FROM tbl_review WHERE pro_id=$pro_id";
										$fetch_data=$obj->selectReview($sqli);
										while($r_data=$fetch_data->fetch_array())
										{
										
										?>
											
											<div class="reviews">
												<div class="review">
													<div class="review-title"><span class="summary"><?php echo$r_data['summary'];?></span><span class="date"><i class="fa fa-calendar"></i><span>
					<?php 
					//Set the default time zone for Asia/Dhaka
		date_default_timezone_set("Asia/Dhaka");				
						//fetch review sending time 			
					   $sending_time=strtotime($r_data['date']);
					   //current time
					   $current_time= time();
					   //Calculate total spent time in seconds
					   $passed_time=$current_time-$sending_time;
					   if($passed_time<=59)
					   {
						   echo"Just Now";
					   }
					   else if($passed_time>=60 and $passed_time<=3599)
					   {
						   $min=round($passed_time/60);
						   if($min=='1')
						   {
							   echo"1 Min ago";
						   }
						   else
						   {
							 echo"$min Mins ago";  
						   }
					   }
					   else if($passed_time>=3600 and $passed_time<=86399)
					   {
						   $hr=round($passed_time/3600);
						   if($hr=='1')
						   {
							   echo"1 hr ago";
						   }
						   else
						   {
							 echo"$hr hrs ago";  
						   }
					   } 
					   else if($passed_time>=86400)
					   {
						   $day=round($passed_time/86400);
						   if($day=='1')
						   {
							   echo"1 day ago";
						   }
						   else
						   {
							 echo"$day days ago";  
						   }
					   }
					   
					   ?>
													
													
													
													
													</span></span></div>
													<div class="text"><?php echo$r_data['review'];?></div>
																										</div>
											
											</div><!-- /.reviews -->
											
										<?php 
										}
										?>
											
										</div><!-- /.product-reviews -->
										
										
											<?php 
											if(isset($_POST['submit_review']))
											{
												$pro_id		=$r['id'];
												$name		=$_POST['user'];
												$summary	=$_POST['summary'];
												$review		=$_POST['review'];
												$p			=$_POST['price'];
												$q			=$_POST['quality'];
												$v			=$_POST['value'];
								/* $sql	="select * from tbl_review";
								$data	=$obj->selectProductsReview($sql);
								
								while($review_result=$data->fetch_array())
								{
									$pp=$review_result['price'];
									$qp=$review_result['quality'];
									$vp=$review_result['value'];
									

if(!$data)
{	 */
												
												
		$sql="INSERT INTO tbl_review (pro_id,user,summary,review,price,quality,value)VALUES('$pro_id','$name','$summary','$review','$p','$q','$v')";
		$inserted=$obj->insertProduct($sql);
		if($inserted)
		{
			echo"<script>alert('Thanks! Your Review submitted successfully!')</script>";
		}
		else
		{
			echo"<script>alert('Sorry! Your Review not submitted!')</script>";
		}
					
}
/* else 
{
	$sql="UPDATE tbl_review SET price=$p+$pp,quality=$q+$pq,value=$v+$pv WHERE pro_id=$pro_id";
		$obj->updateCategoryItems($sql);
		
}	
								}

} */
											?>
										
										
								<form role="form" action="" method="post"class="cnt-form">
										<div class="product-add-review">
											<h4 class="title">Write your own review</h4>
											<div class="review-table">
												<div class="table-responsive">
													<table class="table">	
														<thead>
															<tr>
																<th class="cell-label">&nbsp;</th>
																<th>1 star</th>
																<th>2 stars</th>
																<th>3 stars</th>
																<th>4 stars</th>
																<th>5 stars</th>
															</tr>
														</thead>	
														<tbody>
															<tr>
																<td class="cell-label">Quality</td>
																<td><input type="radio" name="quality" class="radio" value="1"></td>
																<td><input type="radio" name="quality" class="radio" value="2"></td>
																<td><input type="radio" name="quality" class="radio" value="3"></td>
																<td><input type="radio" name="quality" class="radio" value="4"></td>
																<td><input type="radio" name="quality" class="radio" value="5"></td>
															</tr>
															<tr>
																<td class="cell-label">Price</td>
																<td><input type="radio" name="price" class="radio" value="1"></td>
																<td><input type="radio" name="price" class="radio" value="2"></td>
																<td><input type="radio" name="price" class="radio" value="3"></td>
																<td><input type="radio" name="price" class="radio" value="4"></td>
																<td><input type="radio" name="price" class="radio" value="5"></td>
															</tr>
															<tr>
																<td class="cell-label">Value</td>
																<td><input type="radio" name="value" class="radio" value="1"></td>
																<td><input type="radio" name="value" class="radio" value="2"></td>
																<td><input type="radio" name="value" class="radio" value="3"></td>
																<td><input type="radio" name="value" class="radio" value="4"></td>
																<td><input type="radio" name="value" class="radio" value="5"></td>
															</tr>
														</tbody>
													</table><!-- /.table .table-bordered -->
												</div><!-- /.table-responsive -->
											</div><!-- /.review-table -->
											
											
											
											
											
											<div class="review-form">
												<div class="form-container">
													
														
														<div class="row">
															<div class="col-sm-6">
																<div class="form-group">
																	<label for="exampleInputName">Your Name <span class="astk">*</span></label>
																	<input type="text" class="form-control txt" name="user"id="exampleInputName" placeholder="Enter your name">
																</div><!-- /.form-group -->
																<div class="form-group">
																	<label for="exampleInputSummary">Summary <span class="astk">*</span></label>
																	<input type="text" class="form-control txt" name="summary"id="exampleInputSummary" placeholder="Enter summary...">
																</div><!-- /.form-group -->
															</div>

															<div class="col-md-6">
																<div class="form-group">
																	<label for="exampleInputReview">Review <span class="astk">*</span></label>
																	<textarea class="form-control txt txt-review" name="review"id="exampleInputReview" rows="4" placeholder="Enter your review here..."></textarea>
																</div><!-- /.form-group -->
															</div>
														</div><!-- /.row -->
														
														<div class="action text-right">
															<button name="submit_review"class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
														</div><!-- /.action -->

													</form><!-- /.cnt-form -->
												</div><!-- /.form-container -->
											</div><!-- /.review-form -->

										</div><!-- /.product-add-review -->										
										
							        </div><!-- /.product-tab -->
								</div><!-- /.tab-pane -->

								<div id="tags" class="tab-pane">
									<div class="product-tag">
										
										<h4 class="title">Product Tags</h4>
										<form role="form" class="form-inline form-cnt">
											<div class="form-container">
									
												<div class="form-group">
													<label for="exampleInputTag">Add Your Tags: </label>
													<input type="email" id="exampleInputTag" class="form-control txt">
													

												</div>

												<button class="btn btn-upper btn-primary" type="submit">ADD TAGS</button>
											</div><!-- /.form-container -->
										</form><!-- /.form-cnt -->

										<form role="form" class="form-inline form-cnt">
											<div class="form-group">
												<label>&nbsp;</label>
												<span class="text col-md-offset-3">Use spaces to separate tags. Use single quotes (') for phrases.</span>
											</div>
										</form><!-- /.form-cnt -->

									</div><!-- /.product-tab -->
								</div><!-- /.tab-pane -->

							</div><!-- /.tab-content -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.product-tabs -->
				
				
				<?php 
				}
				
			}
			

			?>
				

				<!-- ============================================== UPSELL PRODUCTS ============================================== -->
<section class="section featured-product wow fadeInUp">
	<h3 class="section-title">upsell products</h3>
	<div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
	    	
		<?php 
						   
		   $obj=new shop();
		   $query="SELECT * FROM tbl_products ORDER BY id DESC LIMIT 15";
		   $read=$obj->selectProducts($query);
			if($read)
			{								
				while($result=$read->fetch_array())
				{
				
			?>	
			
			
			
			
		<div class="item item-carousel">
			<div class="products">
				
	<div class="product">		
		<div class="product-image">
			<div class="image">
				<a href="details.php?pro_id=<?php echo$result['id'];?>"><img  src="admin/upload/<?php echo$result['image'];?>" alt=""></a>
			</div><!-- /.image -->			

			            

<?php 
		
		//Check product's Attributes
		if($result['attribute']=='New')
					{
		?>
			<div class="tag new"><span>new</span></div> 
			<?php
					}
					else if($result['attribute']=='Hot') 
					{
					?>
					<div class="tag hot"><span>hot</span></div>
			<?php 					
					}
					else
					{
					?>
					<div class="tag sale"><span>sale</span></div>
			<?php 					
					}
			?> 


						
		</div><!-- /.product-image -->
			
		
		<div class="product-info text-left">
			<h3 class="name"><a href="details.php?pro_id=<?php echo$result['id'];?>"><?php echo$result['title'];?></a></h3>
			<div>
			<?php 
			$pro_id=$result['id'];
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
			
			
			
			</div>
			<div class="description"></div>

			<div class="product-price">	
				<span class="price">
					$<?php echo$result['price'];?>				</span>
										     <span class="price-before-discount">$ <?php echo$result['prev_price'];?></span>
									
			</div><!-- /.product-price -->
			
		</div><!-- /.product-info -->
					<div class="cart clearfix animate-effect">
				<div class="action">
					<ul class="list-unstyled">
						<li class="add-cart-button btn-group">
						<a href="details.php?pro_id=<?php echo$result['id'];?>">
						<button data-toggle="tooltip"class="btn btn-primary icon"title="Add to cart" type="button">
								<i class="fa fa-shopping-cart"></i>													
							</button></a>
							<button class="btn btn-primary cart-btn" type="button">Add to cart</button>	
						
						</li>
	                   
		                <li class="lnk wishlist">
							<a class="add-to-cart" href="detail.html" title="Wishlist">
								 <i class="icon fa fa-heart"></i>
							</a>
						</li>

						<li class="lnk">
							<a class="add-to-cart" href="detail.html" title="Compare">
							    <i class="fa fa-signal"></i>
							</a>
						</li>
					</ul>
				</div><!-- /.action -->
			</div><!-- /.cart -->
			</div><!-- /.product -->
      
			</div><!-- /.products -->
		</div><!-- /.item -->
		
		<?php 
				}
			}
		?>
	
		
			</div><!-- /.home-owl-carousel -->
</section><!-- /.section -->
<!-- ============================================== UPSELL PRODUCTS : END ============================================== -->
			
			</div><!-- /.col -->
			<div class="clearfix"></div>
		</div><!-- /.row -->
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



<?php include("inc/footer.php");?>