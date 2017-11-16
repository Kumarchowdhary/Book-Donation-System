<?php
   require_once('db_connection.php');
   $notification_query="select * FROM login l INNER JOIN notifications n 
      ON l.user_id=n.ruser_id AND n.user_id=2 INNER JOIN books_ad_table b
      ON b.ad_id=n.ad_id INNER JOIN responses r 
      ON n.`ntf_id`=r.`ntf_id` 
      WHERE r.`status`=1 ORDER BY r.`ntf_id` DESC"; 
	  $notification_res=$con->query($notification_query);
	  if(mysqli_num_rows($notification_res)!=0){
?>
<!doctype html>
<html lang="en"><head>
    <meta charset="utf-8">
    <title>Don-A-Book | Messages</title>
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
								<li><a href="user profile/my-details.html"><i class="fa fa-user"></i> Account</a></li>
								<li><a href="user profile/message.html"><i class="fa fa-crosshairs"></i> Notification</a></li>
								<li><a href="index.html"><i class="fa fa-lock"></i> Logout</a></li>
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
					<img src="images/people/1083978.jpg" class="img-responsive" alt="">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						Marcus Doe
					</div>
					<div class="profile-usertitle-job">
						Developer
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->

				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li>
							<a href="my-details.html">
							<i class="glyphicon glyphicon-home"></i>
							Overview </a>
						</li>
						<li>
							<a href="edit-details.html">
							<i class="glyphicon glyphicon-user"></i>
							Edit Details </a>
						</li>
						<li>
							<a href="manage-ads.html">
							<i class="glyphicon glyphicon-folder-open"></i>
							Manage my Ads </a>
						</li>
						<li class="active">
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
        <div class="main-content">
            <h1 class="page">MESSAGE</h1>
<h3 class="page-tagline"></h3>
<div class="row">
<div class="col-md-10 col-md-offset-1">
<table class="table">
  <thead>
    <tr>
      <th style="width: 50px;"></th>
      <th style="font-size: 20px;">Name</th>
      <th style="font-size: 20px;">Book</th>
      <th class="hidden-xs" style="font-size: 20px;">Web Id</th>
      <th class="hidden-xs" style="font-size: 20px;">Title</th>
      <th style="font-size: 20px;">Author</th>
	  <th style="font-size: 20px;">Date</th>
	  <th style="font-size: 20px;">Time</th>
	  <th style="font-size: 20px;"></th>
    </tr>
  </thead>
  <tbody>
  	<?php
	   while($row=$notification_res->fetch_assoc()){ ?>
     <tr>
      <td></td>
	  <td style="padding-top: 5em;"><?php echo $row['name']; ?></td>
      <td><img class="user" src="<?php echo $row['photo']; ?>"></td>
      <td style="padding-top: 5em;"><?php echo $row['ad_id']; ?></td>
      <td style="padding-top: 5em;"><?php echo $row['title']; ?></td>
      <td style="padding-top: 5em;" class="hidden-xs text-muted"><?php echo $row['author']; ?></td>
      <td style="padding-top: 5em;"><?php echo $row['res_date']; ?></td>
	  <td style="padding-top: 5em;"><?php echo $row['res_time']; ?></td>
	  <td><br> <a href="book_details.php?bookid=<?php echo $row['ad_id'];?>" data-toggle="modal" class="padding-right-small"><i class="fa fa-pencil "></i> More Info</a> <br> <br> <br><a href="#myModal" data-toggle="book_details.php?bookid=<?php echo $row['ad_id'];?>"><i class="fa fa-trash-o "></i> Delete</a></td>
    </tr>
    <?php } } else{ echo "<h1>You don't have any Notifications</h1>"; } ?>
  </tbody>
</table>

<div class="modal small fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Ã</button>
            <h3 id="myModalLabel">Delete Confirmation</h3>
        </div>
        <div class="modal-body">
            <p class="error-text"><i class="fa fa-warning modal-icon"></i>Are you sure you want to delete the user?<br>This cannot be undone.</p>
        </div>
        <div class="modal-footer">
            <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cancel</button>
            <button class="btn btn-danger" data-dismiss="modal">Delete</button>
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
    
  

</body></html>