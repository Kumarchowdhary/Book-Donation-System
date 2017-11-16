<?php
      session_start();
      require_once('db_connection.php');
      $bool=true;
      $user_id=$_GET['uid'];
      $book_id=$_GET['bookid'];
      $ruser_id=$_SESSION['user_id'];
      $query="select * from notifications where user_id=$user_id and ruser_id=$ruser_id and ad_id=$book_id";
      $res=$con->query($query);
      while($row=$res->fetch_assoc()){
         $bool=false;

      } 
      if($bool==1){  
      $query="select * from login where user_id=$user_id";
      $res=$con->query($query);
      while($row=$res->fetch_assoc()){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Contact | E-Shopper</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/MessagePage.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
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
								<li><a href=""><i class="fa fa-star"></i> Wishlist</a></li>
								<li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a href="cart.html"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								<li><a href="login.html"><i class="fa fa-lock"></i> Login</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		
	 
	 <div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center"> <strong>Message</strong></h2>    			    				    				
					<div id="gmap" class="contact-map">
					</div>
				</div>			 		
			</div>    	
    		<div class="row">  	
	    		<div class="col-sm-8" style="border: 2px solid #f5f5f5;">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Reply to the listing</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="main-contact-form" class="contact-form row" action="user_message_confirmation.php" method="post">
				            <div class="form-group col-md-6">
				                <input type="hidden" name="book_id" value="<?php echo $book_id;?>">
                                <input type="hidden" name="user_id" value="<?php echo $user_id;?>">        	
				                <input type="text" name="name" class="form-control" required="required" placeholder="Name" value="<?php echo $row['name']; ?>" readonly>
				            </div>				           
				            <div class="form-group col-md-12">
				                <textarea name="msg" id="message" required="required" class="form-control" rows="8" placeholder="Your Message here" readonly>Dear.<?php echo $row['name'];?>, I want your book please provide me your contact details.</textarea>
				            </div> 

							
				            <div class="form-group col-md-12">
				                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Send">
				            </div>
				        </form>
	    			</div>
	    		</div>
	    		
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->
	<?php } } else { header("location: user_message_confirmation.php"); } ?>
	<?php	
require_once 'footer.php';
?>	

  
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="js/gmaps.js"></script>
	<script src="js/contact.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>