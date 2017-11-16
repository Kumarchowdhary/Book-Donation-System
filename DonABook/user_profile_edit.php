<?php
  session_start();
  require_once('db_connection.php');
  //require_once "test.php";
  $user_id=$_SESSION['user_id'];
  $user_query=mysqli_query($con,"select * from members_table where user_id=$user_id");
  $row=mysqli_fetch_array($user_query);
  $path=$row['path'];
  

?>
<!doctype html>
<html lang="en"><head>
    <meta charset="utf-8">
    <title>Don-A-Book | Details</title>
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
    
    <?php require_once('header.php');
          require_once('search_bar.php');
           require_once('side_menubar.php');?>

   
		
	
	</header><!--/header-->

			</div>
		</div>
	</div>
    </div>

    <div class="content">
        <div class="header">
   
            
            <h1 class="page-title" style="font-size: 24px;"><?php echo strtoupper($row['fname']." ".$row['lname']);?></h1>
            <ul class="breadcrumb">
            <li><a href="index.html" style="font-size: 17px;">Home</a> </li>
            <li><a href="#" style="font-size: 17px;">My Details</a> </li>
            <li class="active" style="font-size: 17px;"><?php echo $row['fname']." ".$row['lname'];?></li>
        </ul>

        </div>
<div class="main-content">
            

<div class="row">
    <div class="col-md-3">

<div class="row">
    <div class="col-md-12 col-sm-5">

        <img src="<?php echo $path; ?>" style="max-width:100%;border-top-left-radius: 3px;border-top-right-radius: 3px;">
       
    </div>
  </div>

        <br>
        <div class="panel panel-default fadeInDown animation-delay2">
            <div class="panel-heading" style="font-size:18px;">
                About Me
            </div>
            <div class="panel-body">
                <p class="text-sm"><span><span class="fa fa-calendar"></span> Updated 6 hours ago</span></p>
                <p>I am Student of mehran uni</p>
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
                                <?php echo $row['fname']." ".$row['lname'];?>
                            </li>
							<br><br>
                            <li>
                                <span class="text-info fa fa-envelope fa-fw"></span>
                                <?php echo $row['email'];?>
                            </li>
							<br><br>
                            <li>
                                <span class="text-info fa fa-home fa-fw"></span>
                                26071 Broadway St. New York, NY 10011
                            </li>
							<br><br>
                            <li>
                                <span class="text-info fa fa-phone fa-fw"></span>
                                <?php echo $row['contact'];?> 
                            </li>
							<br><br>
                            <li>
                                <span class="text-info fa fa-university fa-fw"></span>
                                New York, NY
                            </li>
							<br><br>
                        </ul>

                    </div>
                </div>
            </div>
         
        </div>

        </div>
    </div>
</div>

        </div>
		
			<footer><!--Footer-->
		
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Online Help</a></li>
								<li><a href="#">Contact Us</a></li>
								
								<li><a href="#">Change Location</a></li>
								<li><a href="#">FAQ’s</a></li>
							</ul>
						</div>
					</div>
				
				
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Company Information</a></li>
								<li><a href="#">Careers</a></li>
								<li><a href="#">Store Location</a></li>
								<li><a href="#">Affillate Program</a></li>
								<li><a href="#">Copyright</a></li>
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