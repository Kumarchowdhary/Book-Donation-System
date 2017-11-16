<?php
  session_start();
  if(isset($_SESSION['user_id'])){
  $user_id=$_SESSION['user_id'];
  require_once('db_connection.php');
  $bookmark_query="select b.photo,b.title,b.author,b.ad_status,b.ad_id,m.fname,m.lname from bookmarks bk inner join books_ad_table b on bk.ad_id=b.ad_id and bk.user_id=$user_id inner join members_table m on b.user_id=m.user_id order by bk.date desc";
  $bookmark_res=$con->query($bookmark_query);
?>
<!doctype html>
<html lang="en"><head>
    <meta charset="utf-8">
    <title>Don-A-Book | Wishlist</title>
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
           require_once('side_menubar.php');?>
	   </header><!--/header-->

    <div class="content">
        <div class="main-content">
            <h1 class="page">Saved Searches</h1>
<h3 class="page-tagline"></h3>
<div class="row">
<div class="col-md-10 col-md-offset-1">
<table class="table">
  <thead>
    <tr style="font-size: large;">
      
      <th>Book</th>
      <th class="hidden-xs">Title</th>
      <th>Author</th>
	  <th>Provider</th>
	  <th></th>
    </tr>
  </thead>
  <tbody>
    <?php if(mysqli_num_rows($bookmark_res)!=0){
          while($row=$bookmark_res->fetch_assoc()){?>
    <tr>   
	  <td><img class="user" src="<?php echo $row['photo']; ?>"></td>
      <td style="padding-top: 5em;"><?php echo $row['title']; ?></td>
      <td style="padding-top: 5em;" class="hidden-xs text-muted"><?php echo $row['author']; ?></td>
      <td style="padding-top: 5em;"><?php echo $row['fname']." ".$row['lname']; ?></td>
	  <td><br> <?php if($row['ad_status']==1){?><a href="BooksView.php?bookid=<?php echo $row['ad_id'];?>" data-toggle="modal" class="padding-right-small"><i class="fa fa-pencil "></i> More Info</a>
               <?php } else if($row['ad_status']==0){?><a href="BooksView.php?bookid=<?php echo $row['ad_id'];?>" data-toggle="modal" class="padding-right-small" onclick="return false;"><i class="fa fa-pencil "></i> More Info</a><?php }?>  
               <br> <br> <br><a href="delete_bookmarks.php?bookid=<?php echo $row['ad_id'];?>" ><i class="fa fa-trash-o "></i> Delete</a></td>
    </tr>
    <?php } } else{ ?><h1>Your wishlist is empty</h1><?php } ?>
    
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