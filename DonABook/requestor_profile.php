<?php
  if($_GET['uid']!=null){      
  session_start();  
  require_once('db_connection.php');
  $user_id=$_SESSION['user_id'];
  $ruser_id=$_GET['uid'];
  $book_id=$_GET['bookid'];
  $ntf_id=$_GET['ntfid'];
  $query=mysqli_query($con,"select * from notifications where ntf_id=$ntf_id");
  $ntf_row=mysqli_fetch_array($query);
  $user_query=mysqli_query($con,"select * from members_table where user_id=$ruser_id");
  $res=mysqli_fetch_array($user_query);
  $book_query=mysqli_query($con,"select * from books_ad_table where ad_id=$book_id");
  $bres=mysqli_fetch_array($book_query);
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
    <script src="js/jquery_file.js"></script>
    <script src="js/profile_jquery.js"></script>
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
          require_once('side_menubar.php'); 
          ?>

   
		
	
	</header><!--/header-->

			</div>
		</div>
	</div>
    </div>

    <div class="content">
        <div class="header">
   
            
            <h1 class="page-title" style="font-size: 24px;"><?php echo strtoupper($res['fname']." ".$res['lname']);?></h1>
            <ul class="breadcrumb">
            <li><a href="index.html" style="font-size: 17px;">Home</a> </li>
            <li><a href="#" style="font-size: 17px;">My Details</a> </li>
            <li class="active" style="font-size: 17px;"><?php echo $res['fname']." ".$res['lname'];?></li>
        </ul>

        </div>
<div class="main-content">
            

<div class="row">
    <div class="col-md-3">

<div class="row">
    <div class="col-md-12 col-sm-5">

        <img src="<?php echo $res['photo']; ?>" style="max-width:100%;border-top-left-radius: 3px;border-top-right-radius: 3px;">
       
    </div>
  </div>

        <br>
        <div class="panel panel-default fadeInDown animation-delay2">
            <div class="panel-heading" style="font-size:18px;">
                About Me
            </div>
            <div class="panel-body">
               <p class="text-sm"></p>
               <p><?php echo $res['aboutme'];?>.</p>
            </div>
        </div>

    </div>
    <div class="col-md-9">
        <div class="row">
            <form action="request_approve.php?uid=<?php echo $ruser_id;?>&bookid=<?php echo $book_id;?>" method="Post">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading" style="font-size:18px;">User Info</div>
                    <div class="panel-body">
                        <ul class="list-unstyled list-info">
                            <li>
                                <span class="text-info fa fa-user fa-fw"></span>
                                <?php echo $res['fname']." ".$res['lname'];?>
                            </li>
							<br><br>
                            
                            <li>
                                <span class="text-info fa fa-home fa-fw"></span>
                                <?php echo $res['city'];?>
                            </li>
							<br><br>
                            <li>
                              <?php
                               $str=$ntf_row['contact'];    
                               if((strlen($str)==12) || $str[0]=="0" || $str[0]=="+" ){?>
                                <span class="text-info fa fa-phone fa-fw"></span>
                                <?php echo $res['contact'];?>
                               <?php } else { ?>
                                <span class="text-info fa fa-envelope fa-fw"></span>
                                <?php echo $res['email'];?>
                               <?php }?>  
                            </li>
							<br><br>
                          
                            <li>
                                <span class="text-info fa fa-university fa-fw"></span>
                                Requesting for&nbsp;&nbsp;&nbsp;<a href="BooksView.php?bookid=<?php echo $bres['ad_id'];?>"><b><?php echo $bres['title'];?></b></a>
                            </li>
                            <br><br>
                        </ul>
                    </div>
                </div>
            </div>
         
        </div>

        </div>
        <div style="margin-left:30%;">
        <?php if($ntf_row['status']==0){?>
                    <button type="button" id="aprv_btn" class="btn btn-default add-to-cart">Approve</button>&nbsp;&nbsp;&nbsp;
                    <a href="request_approve.php?uid=<?php echo $ruser_id;?>&bookid=<?php echo $book_id;?>&ntf_id=<?php echo $ntf_id;?>" class="btn btn-default add-to-cart">Reject</a><?php } 
                    else{?>
                      <a href="" class="btn btn-default add-to-cart">Response sent already</a>
                    <?php } ?>
                     <div id="cnt_opt">
                      <h1>How this reciever can contact with you, via</h1>
                      <input type="hidden" name="ntf_id" value="<?php echo $ntf_id;?>">
                      <?php?>
                      <input type="radio" name="cnt_opt" value="mobile">Mobile number<br/>
                      <input type="radio" name="cnt_opt" value="email">Email<br/><br/>
                      <button type="button" id="cncl_btn" class="btn btn-default add-to-cart">Cancel</button>
                      <button type="submit" name="submit" class="btn btn-default add-to-cart">OK</a>
                    </div>
        </div>
    </div>
</form>
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
 <?php } ?>