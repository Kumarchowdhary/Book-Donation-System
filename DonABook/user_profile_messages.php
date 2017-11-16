<?php
   session_start();
   if(isset($_SESSION['user_id'])){
   require_once('db_connection.php');
   $user_id=$_SESSION['user_id'];
    $user_id=$_SESSION['user_id'];
      if(isset($_POST['recieve'])){
        $message_query="select m.user_id,m.fname,m.lname,b.photo,b.ad_id,b.title,b.author,n.ntf_id,n.date,n.time,n.status from members_table m inner join notifications n on m.user_id=n.ruser_id and n.user_id=$user_id and n.status=0 inner join books_ad_table b on b.ad_id=n.ad_id";
      } else if (isset($_POST['sent'])) {
        $message_query="select m.user_id,m.fname,m.lname,b.photo,b.ad_id,b.title,b.author,n.ntf_id,n.date,n.time,n.status from members_table m inner join notifications n on m.user_id=n.ruser_id and n.user_id=$user_id and (n.status=1 || n.status=2) inner join books_ad_table b on b.ad_id=n.ad_id order by n.ntf_id desc";
      }
      else{
        $message_query="select m.user_id,m.fname,m.lname,b.photo,b.ad_id,b.title,b.author,n.ntf_id,n.date,n.time,n.status from members_table m inner join notifications n on m.user_id=n.ruser_id and n.user_id=$user_id and n.status=0 inner join books_ad_table b on b.ad_id=n.ad_id";
      } 
   
      $message_res=$con->query($message_query);

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
    <link rel="stylesheet" type="text/css" href="stylesheets/theme.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/premium.css">
	 <script src="lib/jquery-1.11.1.min.js" type="text/javascript"></script>
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
            <h1 class="page">MESSAGES</h1>
<h3 class="page-tagline"></h3>
<div class="row">
<div class="col-md-10 col-md-offset-1">
<form action="user_profile_messages.php" method="post"> 
<hr>
  <div class="btn-toolbar list-toolbar" style="margin-left:80%">
              <?php if(isset($_POST['recieve'])){ ?>
              <button class="btn btn-primary" type="submit" name="recieve" style="background:green; border-radius: 25px; border: 2px solid #73AD21;">Recieved</button>
              <button class="btn btn-primary" type="submit" name="sent" style="border-radius: 25px; width:90px;">Sent</button>
              <?php } else if(isset($_POST['sent'])){ ?>
              <button class="btn btn-primary" type="submit" name="recieve" style="border-radius: 25px;">Recieved</button>
              <button class="btn btn-primary" type="submit" name="sent" style="background:green; border-radius: 25px; border: 2px solid #73AD21; width:90px;">Sent</button>
  </div>      <?php } else{?>
              <button class="btn btn-primary" type="submit" name="recieve" style="background:green; border-radius: 25px; border: 2px solid #73AD21;">Recieved</button>
              <button class="btn btn-primary" type="submit" name="sent" style="border-radius: 25px; width:90px;">Sent</button> <?php } ?>
  </div> 
  </div>
<hr>  
</form>   

  	<?php
	   if(mysqli_num_rows($message_res)!=0){?>
     <table class="table">
  <thead>
    <tr>
      <th style="width: 50px;"></th>
      <th style="font-size: 20px;">Name</th>
      <th style="font-size: 20px;">Book</th>
      <th class="hidden-xs" style="font-size: 20px;">Title</th>
      <th style="font-size: 20px;">Author</th>
    <th style="font-size: 20px;">Date</th>
    <th style="font-size: 20px;">Time</th>
    <th style="font-size: 20px;">Status</th>
    <th style="font-size: 20px;"></th>
    </tr>
  </thead>
  <tbody>

	   <?php while($row=$message_res->fetch_assoc()){ ?>
     <tr>
      <td></td>
	  <td style="padding-top: 5em;"><?php echo $row['fname']." ".$row['lname']; ?></td>
      <td><img class="user" src="<?php echo $row['photo']; ?>"></td>
      <td style="padding-top: 5em;"><?php echo $row['title']; ?></td>
      <td style="padding-top: 5em;" class="hidden-xs text-muted"><?php echo $row['author']; ?></td>
      <td style="padding-top: 5em;"><?php  $date=date_create($row['date']); echo date_format($date,'d-m-Y'); ?></td>
	  <td style="padding-top: 5em;"><?php echo $row['time']; ?></td>
    <td style="padding-top: 5em;"><?php
    $ad_id=$row['ad_id'];
    $ruser_id=$row['user_id']; 
    //$status_query=mysqli_query($con,"select n.`status` FROM responses r INNER JOIN notifications n ON r.`ntf_id`=n.`ntf_id` WHERE n.`user_id`=$user_id AND n.`ad_id`=$ad_id AND n.`ruser_id`=$ruser_id");
    //echo $query="select n.`status` FROM responses r INNER JOIN notifications n ON r.`ntf_id`=n.`ntf_id` WHERE n.`user_id`=$user_id AND n.`ad_id`=$ad_id AND n.`ruser_id`=$ruser_id";
    //$status_query_res=mysqli_fetch_array($status_query);
    //if($status_query_res['status']==1){
    if($row['status']==1){
    echo "Approved"; } else if($row['status']==2){ echo "Rejected"; } else if($row['status']==0) { echo "Pending"; } ?></td>
	  <td><br><br> <br><a href="requestor_profile.php?uid=<?php echo $row['user_id'];?>&bookid=<?php echo $row['ad_id'];?>&ntfid=<?php echo $row['ntf_id'];?>" data-toggle="modal" class="padding-right-small"><i class="fa fa-pencil "></i>Profile</a></td>
    </tr>
    <?php } } else{echo "<br><br><br><br><br><br><center><h1>You don't have any Messages</h1></center>"; } ?>
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
	
	
	<script src="js/looking.js"></script>
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