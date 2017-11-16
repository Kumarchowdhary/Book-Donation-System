<?php
		include "db_connection.php";
		include "test.php";
	?>


<!doctype html>
<html lang="en"><head>
    <meta charset="utf-8">
    <title>Bootstrap Admin</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="lib/bootstrap/css/sidebar.css">
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">
	<link href="css/Search-bar.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">

    <script src="lib/jquery-1.11.1.min.js" type="text/javascript"></script>

        <script src="lib/jquery.peity.min.js"></script>
    <link rel="stylesheet" href="lib/fancy-zoom/css/fancyzoom.css" type="text/css">
	<script type="text/javascript" src="lib/fancy-zoom/src/fancyzoom.js"></script>
	
    <link rel="stylesheet" type="text/css" href="stylesheets/theme.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/premium.css">

</head>
<body>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  

  <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
  <!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
  <!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
  <!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!--> 
   
  <!--<![endif]-->

   	<header id="header" style="background-color:white;">
		
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

 <div class="sidebar-nav">
<div class="row profile">
		<div class="col-md-3" style="width: 100%">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img src="<?php echo $path;?>" class="img-responsive" alt="">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						<?php echo $firstName." ".$lastName;?>
					</div>
					<div>
					
					</div>
					
				</div>
				<!-- END SIDEBAR USER TITLE -->

				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li class="active">
							<a href="my-details.php">
							<i class="glyphicon glyphicon-home"></i>
							Overview </a>
						</li>
						<li>
							<a href="edit-details.php">
							<i class="glyphicon glyphicon-user"></i>
							Edit Details </a>
						</li>
						<li>
							<a href="manage-ads.html">
							<i class="glyphicon glyphicon-folder-open"></i>
							Manage my Ads </a>
						</li>
						<li>
							<a href="message.html">
							<i class="glyphicon glyphicon-envelope"></i>
							Message </a>
						</li>
						<li>
							<a href="saved-searches.html">
							<i class="glyphicon glyphicon-floppy-disk"></i>
							Saved Searches </a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
	</div>
    </div>

    <div class="content">
        <div class="header">
   

            <h1 class="page-title">User Name</h1>
            <ul class="breadcrumb">
            <li><a href="index.html">Home</a> </li>
            <li><a href="my-details.html">My Details</a> </li>
            <li class="active">user name</li>
        </ul>

        </div>
<div class="main-content">
            

<div class="row">
    <div class="col-md-3">

<div class="row">
    <div class="col-md-12 col-sm-5">

        <img src="<?php echo $path;?>" style="max-width:100%;border-top-left-radius: 3px;border-top-right-radius: 3px;">
       
    </div>
  </div>

        <br>
        <div class="panel panel-default fadeInDown animation-delay2">
            <div class="panel-heading" style="font-size:18px;">
                About Me
            </div>
            <div class="panel-body">
                <p class="text-sm"><span><span class="fa fa-calendar"></span> Updated 6 hours ago</span></p>
                <p>I am a student at Mehran University  of Engineering and Technology Jamshoro.</p>
            </div>
        </div>

    </div>
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading" style="font-size:18px;">User Info</div>
                    <div class="panel-body">
                        <ul class="list-unstyled list-info">
                            <li>
                                <span class="text-info fa fa-user fa-fw"></span>
                                <?php echo $firstName.$lastName;?>
                            </li>
							<br><br>
                            <li>
                                <span class="text-info fa fa-envelope fa-fw"></span>
                                <?php echo $email; ?>
                            </li>
							<br><br>
                            <li>
                                <span class="text-info fa fa-phone fa-fw"></span>
								<?php echo $contact;?> 
                            </li>
                        </ul>
					
                    </div>
                </div>
            </div>
         
        </div>

        </div>
    </div>
</div>

        </div>
		
		
			<?php	
require_once 'footer.php';
?>	
	<a id="scrollUp" href="#top" style="position: fixed; z-index: 2147483647;"><i class="fa fa-angle-up"></i></a>
	

    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
    <script src="lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
    
  

<div id="zoom-box" style="display:none;">
   <div class="zoom-content">
   </div>
   <a href="javascript:void(0)" class="zoom-close">
     <img src="lib/fancy-zoom/img//closebox.png" alt="×">
   </a>
 </div></body></html>