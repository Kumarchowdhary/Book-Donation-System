<?php
    session_start();
    if(isset($_SESSION['user_id'])){
      include_once('db_connection.php');
      $user_id=$_SESSION['user_id'];
      if(isset($_POST['active'])){
        $ads_query="select * from books_ad_table where user_id=$user_id and ad_status=1 order by posting_time desc";
	    } else if (isset($_POST['inactive'])){
        $ads_query="select * from books_ad_table where user_id=$user_id and ad_status=0 order by posting_time desc";  
      }
      else{
        $ads_query="select * from books_ad_table where user_id=$user_id and ad_status=1 order by posting_time desc";
      } 
    
    $ads_res=$con->query($ads_query);
?>	
<!doctype html>
<html lang="en"><head>
    <meta charset="utf-8">
    <title>Don-A-Book | Ads</title>
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
		
		<?php require_once('header.php'); 
              require_once('search_bar.php');
              require_once('side_menubar.php');        
		?>
	
	</header><!--/header-->
	
	
    
			</div>
		</div>
	</div>
    </div>

    <div class="content">
        <div class="main-content">
            <h1 class="page">Manage My Ads</h1>
<h3 class="page-tagline"></h3>
<div class="row">
<div class="col-md-10 col-md-offset-1">
<form action="user_profile_ads.php" method="post"> 
<hr>
  <div class="btn-toolbar list-toolbar" style="margin-left:80%">
              <?php if(isset($_POST['active'])){ ?>
              <button class="btn btn-primary" type="submit" name="active"  style="background:green;border-radius: 25px; border: 2px solid #73AD21;">Active</button>
              <button class="btn btn-primary" type="submit" name="inactive" style="border-radius: 25px;">Inactive</button>
              <?php } else if(isset($_POST['inactive'])){ ?>
              <button class="btn btn-primary" type="submit" name="active" style="border-radius: 25px;">Active</button>
              <button class="btn btn-primary" type="submit" name="inactive" style="background:green; border-radius: 25px; border: 2px solid #73AD21;">Inactive</button>
              <?php } else{ ?>
              <button class="btn btn-primary" type="submit" name="active" style="background:green; border-radius: 25px; border: 2px solid #73AD21;">Active</button>
              <button class="btn btn-primary" type="submit" name="inactive" style="border-radius: 25px;">Inactive</button> <?php } ?>             
  </div>
<hr>  
</form> 
    
<table class="table">
  <thead>
    <tr>
      <th style="width: 25px;"></th>
      <th style="font-size: 20px;">Books</th>
      <th class="hidden-xs" style="font-size: 20px;">Title</th>
      <th style="font-size: 20px;">Post Date</th>
	  <th style="font-size: 20px;">Post Time</th>
	  <th style="font-size: 20px;"></th>
    </tr>
  </thead>


  <tbody>
    <tr>
      <?php while($row=$ads_res->fetch_assoc()){ ?>	
      <td></td>
	  <td><img class="user" src="<?php echo $row['photo'];?>"></td>
      <td style="padding-top: 5em;"><?php echo $row['title']; ?></td>
      <td style="padding-top: 5em;" class="hidden-xs text-muted"><?php $date=date_create($row['posting_date']); echo date_format($date,"d/m/Y"); ?></td>
      <td style="padding-top: 5em;"><?php echo $row['posting_time']; ?></td>
	  <td><br><a href="BooksView.php?bookid=<?php echo $row['ad_id']; ?>" data-toggle="modal" class="padding-right-small" > <i class="fa fa-pencil"></i>Preview</a> <br> <br> 
      <a href="ads_update.php?eid=<?php echo $row['ad_id']; ?>" data-toggle="modal" class="padding-right-small" > <i class="fa fa-pencil"></i>Edit</a> <br> <br>
      <?php if(isset($_POST['active'])){ ?>
        <a href="ads_delete.php?deactive&did=<?php echo $row['ad_id']; ?>" data-toggle="modal"><i class="fa fa-trash-o "></i>Deactivate</a></td>
      <?php } else if(isset($_POST['inactive'])){?>
        <a href="ads_delete.php?delete&did=<?php echo $row['ad_id']; ?>" data-toggle="modal"><i class="fa fa-trash-o "></i>Delete</a></td>
        <td style="padding-top: 5em;">
        <a href="ads_delete.php?active&did=<?php echo $row['ad_id']; ?>" data-toggle="modal"><button class="btn btn-primary" type="button" name="active">Activate</button></a>
</td>
      <?php } else{ ?>
         <a href="ads_delete.php?deactive&did=<?php echo $row['ad_id']; ?>" data-toggle="modal"><i class="fa fa-trash-o "></i>Deactivate</a></td>
         <?php }?>  

    </tr>
    <?php } ?>
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

<div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Ã</button>
            <h3 id="myModalLabel">Edit User</h3>
        </div>
        <div class="modal-body">
            <form>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" value="Ashley Jacobs">
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" value="ash11297">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" value="ash11297@example.com">
                </div>

                <label>User Card</label>
                <div class="well">
                    <p class="label label-primary header-label">Ashley Jacobs</p>
                    <div class="img pull-left padding-right">
                        <img src="images/faces/1b.png" style="width: 64px;">
                        <div class="label label-info img-label">Pro</div>
                    </div>
                    <p class="info-text">Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Food truck fixie locavore coffee squid.</p>
                    <div>
                        <p class="time pull-right text-sm">5 minutes ago</p>
                        <a href="#"><span class="text-sm padding-right">15 <i class="fa fa-thumb-tack "></i></span></a>
                        <a href="#"><span class="text-sm padding-right">27 <i class="fa fa-bullhorn "></i></span></a>
                        <a href="#"><span class="text-sm padding-right">158 <i class="fa fa-eye "></i></span></a>
                    </div>
                    <div style="clear:both;"></div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cancel</button>
            <button class="btn btn-primary" data-dismiss="modal">Save</button>
        </div>
      </div>
    </div>
</div>
</div>
</div>

        </div>
    </div>
	
		<?php require_once 'footer.php';?>
	

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
<?php } else { echo "<script>location.assign('login.php')</script>"; }?>