<?php
  session_start();
  require_once('db_connection.php');
  $user_id=2;
  $_SESSION['user_id']=$user_id;
  $book_search_query="select * from book_cats";
  $book_search_res=$con->query($book_search_query);
  $book_cats_query="select * from book_cats";
  $book_cats_res=$con->query($book_cats_query);
  $book_subcats_query="select * from book_subcats";
  $book_subcats_res=$con->query($book_subcats_query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Submit Ad | Book</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/form-mini.css" rel="stylesheet">
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
	<header id="header"><!--header-->
		
		
		<div class="header-middle"><!--header-middle-->
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
								<li><a href=""><i class="fa fa-user"></i> Account</a></li>
								
								<li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								
								<li><a href="login.html" class="active"><i class="fa fa-lock"></i> Login</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-container header-search" id="site-search" role="search">
		<form>
			<ul class="unorder-list1">
			<span>	
			<select class="select-items " data-autowidth="true" title="Search category" name="search_category" data-current-category-name="All Categories" data-current-category="all"  aria-invalid: "false" style="">
			<option value="all" selected="" data-category-default="">All</option>
			<?php while($row=$book_search_res->fetch_assoc()){?>
			<option value="<?php echo $row['cat_id'];?>"><?php echo $row['cat_name'];?></option><?php } ?>
			
			</select>
			</span>
			
			<span><input class="clear-input-wrapper" type="search" name="search" id="header-search" title="Search by keyword" autocomplete="off" onFocus="this.placeholder=''"placeholder="I'm looking for..." value="" aria-autocomplete="list" aria-owns="header-search" data-type-ahead="channel:search"></span>
			
			
			<label class="header-search-in" style="padding:0 0 0 7.5px;" for="header-search-location">
			IN
			</label>	
			<span class="clear-input-wrapper"><input type="search" name="search_location" onFocus="this.placeholder=''" placeholder="Postcode or location" title="Location" id="header-search-location" autocomplete="off" data-type-ahead="channel:location" aria-autocomplete="list" aria-owns="header-search-location-type-ahead" value="" style=" width: 213.34px; height:35px; border: 1px solid transparent; border-radius: 2px;  font-family: Source Sans Pro,Arial,sans-serif; font-size: 16px; line-height: 20px; padding: 5px 8px;"></span>	
				
			<span class="header-search-submit">
			<button type="submit" class="btn-primary2 btn-icon" name="search-gumtree" data-submit-ignore="" style="height: 35px; width: 41px; padding:0px; border:1px solid transparent;">
            Go
            </button>
			</span>
		</ul>
	</form>
</div><!--header-bottom-->
	</header><!--/header-->
	
	<section id="form"><!--form-->
	
        <div class="form-mini-container">


            <h1>DETAILS FOR AD</h1>

            <form class="form-mini" enctype="multipart/form-data" action="index.php" method="POST"  autocomplete="off">

                <div class="form-row">
				<h4>Title</h4>
                    <input type="text" name="title" placeholder="">
                </div>

                <div class="form-row">
				<h4>Category</h4>
                    <label>
                        <select name="cat">
                        	<option>Category</option>
                        	<?php while($row=$book_cats_res->fetch_assoc()){?>
                            <option value="<?php echo $row['cat_id'];?>" name="cat"><?php echo($row['cat_name']);?></option><?php } ?>
                        </select>
                    </label>
                </div>
                
                <div class="form-row">
				<h4>Sub Category</h4>
                    <label>
                        <select name="subcat">
                        	<option>Sub Category</option>
                        	<?php while($row=$book_subcats_res->fetch_assoc()){?>
                            <option value="<?php echo $row['subcat_id'] ;?>"><?php echo($row['subcat_name']);?></option><?php } ?>
                        </select>
                    </label>
                </div>
				
				    <div class="form-row">
				<h4>Edition</h4>
                    <label>
                        <select name="edition">
                            <option>Mention Edition Number</option>
                            <option>1st</option>
                            <option>2nd</option>
                            <option>3rd</option>
                            <option>4th</option>
							
                        </select>
                    </label>
                </div>
				
				<div class="form-row">
				<h4>Author</h4>
                    <input type="text" name="author" placeholder="">
                </div>
  
              <div class="form-row">
			  <h4>Copy</h4>
                    <div class="form-radio-buttons">

                        <div>
                            <label>
                                <input type="radio" name="copy">
                                <span>Original</span>
                            </label>
                        </div>

                        <div>
                            <label>
                                <input type="radio" name="copy">
                                <span>Second Copy</span>
                            </label>
                        </div>


                    </div>
                </div>
				     <div class="form-row">
					 <h4>Condition</h4>
                    <div class="form-radio-buttons">

                        <div>
                            <label>
                                <input type="radio" name="condition">
                                <span>New</span>
                            </label>
                        </div>

                        <div>
                            <label>
                                <input type="radio" name="condition">
                                <span>Old</span>
                            </label>
                        </div>


                    </div>
                </div>
               <div class="form-row">
                <label>
                    <h4>Description</h4>
                    <textarea rows="7" cols="35" name="desc"></textarea>
                </label>
            </div>
                <div class="form-row form-last-row">
				    <input type="file" name="uploadedfile" value="Choose A File"><br>
                    <button type="submit" name="ad_submit">Post Ad</button>
                </div>

            </form>
        </div>
	</section><!--/form-->
		
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
		
		
	</footer><!--/Footer-->
	
	
	

  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
	<script src="js/SignUpVerify.js"></script>
</body>
</html>