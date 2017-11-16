<?php
          session_start();  
          require_once('db_connection.php');
          if($_GET['bookid']!=null){
          	$book_id=$_GET['bookid'];
          	$select_query="select * from login l inner join books_ad_table b on l.user_id=b.user_id where ad_id=$book_id";
            $res=$con->query($select_query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Book Details | Info </title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/BooksView.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<link href="css/Search-bar.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header">
		
		<div class="header-middle"><!--header-top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.html"><img src="images/home/logo.png" alt="" /></a>
						</div>
			
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-user"></i> Account</a></li>
								<li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a href="login.html"><i class="fa fa-lock"></i> Login</a></li>
							</ul>
						</div>
					</div>
				</div>

		
			</div>			
		</div><!--/header-top-->
		<div class="header-container header-search" id="site-search" role="search">
		<form>
			<ul class="unorder-list1">
			<span>
			<select class="select-items " data-autowidth="true" title="Search category" name="search_category" data-current-category-name="All Categories" data-current-category="all"  aria-invalid: "false" style="">
			<option value="all" selected="" data-category-default="">All</option>
			<option value="cars-vans-motorbikes">Motors</option>
			<option value="for-sale">For Sale</option>
			<option value="flats-houses">Property</option>
			<option value="jobs">Jobs</option>
			<option value="business-services">Services</option>
			<option value="community">Community</option>
			<option value="pets">Pets</option>
			</select>
			</span>
			
			<span><input class="clear-input-wrapper" type="search" name="search" id="header-search" title="Search by keyword" autocomplete="off" placeholder="I'm looking for..." value="" aria-autocomplete="list" aria-owns="header-search" data-type-ahead="channel:search"></span>
			
			
			<label class="header-search-in" style="padding:0 0 0 7.5px;" for="header-search-location">
			IN
			</label>
			
			
			<span class="clear-input-wrapper"><input type="search" name="search_location" placeholder="Postcode or location" title="Location" id="header-search-location" autocomplete="off" data-type-ahead="channel:location" aria-autocomplete="list" aria-owns="header-search-location-type-ahead" value="" style=" width: 213.34px; height:35px; border: 1px solid transparent; border-radius: 2px;  font-family: Source Sans Pro,Arial,sans-serif; font-size: 16px; line-height: 20px; padding: 5px 8px;"></span>	
				
			<span class="header-search-submit">
			<button type="submit" class="btn-primary2 btn-icon" name="search-gumtree" data-submit-ignore="" style="height: 35px; width: 41px; padding:0px; border:1px solid transparent;">
            Go
            </button>
			</span>
		</ul>
	</form>
</div>
	
	</header><!--/header-->
		<div class="row">    		
	    		<div class="col-sm-12">    			   			
					 			    				    				
					<div id="gmap" class="contact-map">
					</div>
				</div>			 		
			</div>  
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Categories</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
						<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="Mathematics.html">Mathematics</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="Science.html">Science</a></h4>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="English.html">English</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="Commerce.html">Commerce</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="Programming.html">Programming</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="Computer.html">Computer</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="Miscellineous.html">Miscellineous</a></h4>
								</div>
							</div>
							
						
						
						</div><!--/category-products-->
					
	
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<?php while($row=$res->fetch_assoc()){ ?>
								<img id="zoom_05" src="<?php echo $row['photo']; ?>" alt="" data-zoom-image="images/product-details/1.jpg"/>
								
							</div>


						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<h2><?php echo $row['title']; ?></h2>
								<p><?php $date=date_create($row['posting_date']); 
								         echo date_format($date,"d/m/Y"); ?></p>
								
								<span style=" border: 1px solid #f5f5f5; width: 95%; height: 1; margin-top: 7px; ">
									
								</span>
								<h2>Contact details</h2>
								
								<form id="email-contact-form" class="email-form" name="user_message.php" method="post">
								<p><?php echo strtoupper($row['name']); ?></p>
								
								<p>Email <?php echo "   ". substr($row['email'],0,8)."XXXXXXXX"; ?></p>
								
								<p>Contact <?php echo "   ". substr($row['contact'],0,4)."XXXXXXXX"; ?></p>
								
								</form>
								
								<span style=" border: 1px solid #f5f5f5; width: 95%; height: 1; margin-top: 3px; ">
									
								</span>
								
				                <span>
									<a href="user_message.php?bookid=<?php echo $book_id;?>&uid=<?php echo $row['user_id'];?>"><button type="button" class="btn btn-fefault cart" style="margin-top: 40px; width: 390px;">
									<i class="glyphicon glyphicon-envelope"></i>
										Email
									</button></a>
								</span>
								<?php } } ?>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li><a href="#details" data-toggle="tab">Details</a></li>
								
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade" id="details" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery1.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery2.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery3.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery4.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							
						</div>
					</div><!--/category-tab-->
					
					
					
				</div>
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->
		
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">Online Help</a></li>
								<li><a href="">Contact Us</a></li>
								<li><a href="">Order Status</a></li>
								<li><a href="">Change Location</a></li>
								<li><a href="">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Quock Shop</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">T-Shirt</a></li>
								<li><a href="">Mens</a></li>
								<li><a href="">Womens</a></li>
								<li><a href="">Gift Cards</a></li>
								<li><a href="">Shoes</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">Terms of Use</a></li>
								<li><a href="">Privecy Policy</a></li>
								<li><a href="">Refund Policy</a></li>
								<li><a href="">Billing System</a></li>
								<li><a href="">Ticket System</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">Company Information</a></li>
								<li><a href="">Careers</a></li>
								<li><a href="">Store Location</a></li>
								<li><a href="">Affillate Program</a></li>
								<li><a href="">Copyright</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Get the most recent updates from <br />our site and be updated your self...</p>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>

</html>