<?php
   if(isset($_SESSION['user_id'])){
     require_once('db_connection.php');
	 $userid=$_SESSION['user_id'];
	 $query=mysqli_query($con,"select fname,lname from members_table where user_id=$userid");
	 $result=mysqli_fetch_assoc($query);
	 $username=$result['fname']." ".$result['lname'];
	 $notif_query=mysqli_query($con,"select m.user_id,m.photo,m.fname,m.lname,b.title,b.ad_id,n.ntf_id,r.status FROM responses r 
                                     INNER JOIN notifications n ON r.`ntf_id`=n.`ntf_id` AND n.`ruser_id`=$userid 
                                     INNER JOIN members_table m ON m.`user_id`=n.`user_id`
                                     INNER JOIN books_ad_table b ON b.`ad_id`=n.`ad_id`");
	$msg_query=mysqli_query($con,"select * from notifications where user_id=$userid");
	
	 //$notif_query=mysqli_query($con,"select m.user_id,m.photo,m.fname,m.lname,b.title,b.ad_id,n.ntf_id,r.status from members_table m inner join notifications n on m.user_id=n.ruser_id and n.user_id=$user_id inner join books_ad_table b on b.ad_id=n.ad_id");
?>	 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Don-A-Book | Home</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<link href="css/Search-bar.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/message.js" type="text/javascript"></script>
	<script src="js/notification.js" type="text/javascript"></script>
	<script src="js/NotificationData.js" type="text/javascript"></script>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<!--<script src="js/notification.js" type="text/javascript"></script>-->

	
</head><!--/head-->

<body>
	<header id="header">
	  <div class="header-middle"><!--header-top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php"><img src="images/home/logo.png" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="index.php">Home</a></li>
								<li><a href="user_profile.php"><i class="fa fa-user"></i><?php echo " ".$username; ?></a></li>
							<div class="mainmenu pull-left" >
						<ul class="nav navbar-nav collapse navbar-collapse">
							<li class="dropdown">
								<a href="#"><i class="fa fa-bell"></i>Notifications<span id ="nmrnot" class="badge"  style="position:absolute;display:block; position:absolute;background:#E1141E; color:#FFF;font-size:14px; font-weight:normal;padding:2px 3px 2px 3px; margin:-32px 0 0 92px;border-radius:2px;-moz-border-radius:2px;  -webkit-border-radius:2px;z-index:1;"></span></a>
                                    <ul role="menu" class="sub-menu" style="width:500px;">
                                    	
                                    </ul>
                                </li>  
							</ul>
						</div>
								 	
						        <li><a href="user_profile_messages.php"><i class="glyphicon glyphicon-envelope" style="margin-top: -5px;"><span  id ="nmrmsg" class="badge" style="position:absolute;display:block; position:absolute;background:#E1141E; color:#FFF;font-size:14px; font-weight:normal;padding:1px 3px 4px 3px; margin:-35.9px 0 0 81px;border-radius:2px;-moz-border-radius:2px;  -webkit-border-radius:2px;z-index:1;"></span></i> Messages</a></li>
								
								
								
								<li><a href="logout.php"><i class="fa fa-lock"></i> Logout</a></li>
								<li class="header-nav-postad">
								<a class="btn1 btn-primary1 btn-outline1" href="post_ad.php" title="Post an ad" >
								<span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span>&nbsp;
								<span class="btn-header-txt">Post an ad</span>
								</a>
								</li>
							</ul>
						
						</div>
					</div>

				</div>

		
			</div>			
		</div><!--/header-top-->
		
	</header><!--/header-->
	
	
	
</body>
</html>
<?php } ?>