<?php
      session_start();
      if(isset($_SESSION['user_id'])) {  
      require_once('db_connection.php');
      $bool=1;
      $user_id=$_GET['uid'];
      $book_id=$_GET['bookid'];
      $ruser_id=$_SESSION['user_id'];
      $query=mysqli_query($con,"select * from notifications where user_id=$user_id and ruser_id=$ruser_id and ad_id=$book_id and (status =0 || status=1)");
      $row=mysqli_fetch_array($query);
      //echo $query;
      //echo $row;
      //$res=$con->query($query);
      if($row==true){
      	$bool=0;
      }
      //echo "<br> bool is ".$bool;
      //echo "<br>Row status :".$row['status'];
                    if($bool==1){
                         //echo "<br>Inside Bool is 1";  
                         $query="select * from members_table where user_id=$user_id";
                         $res=$con->query($query);
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Don-A-Book | Message</title>
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
	<?php require_once('header.php'); ?>
	 <div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center"> <strong>Message</strong></h2>    			    				    				
					<div id="gmap" class="contact-map">
					</div>
				</div>			 		
			</div>
               <div class="row" >  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="main-contact-form"  action="user_message_confirmation.php" class="contact-form row" name="contact-form" method="post">
				            <div class="form-group col-md-6">
				               <input type="hidden" name="book_id" value="<?php echo $book_id;?>">
                                <input type="hidden" name="user_id" value="<?php echo $user_id;?>">
                                <?php while($row=$res->fetch_assoc()){ ?>
                         <h3>Provider Name</h3>   	
				                <input type="text" name="name" class="form-control" required="required" value="<?php echo $row['fname']; ?>" readonly>
				            </div>
							<div class="form-group col-md-6">
				
							  <div style="margin-top: 120px; margin-left: -385px; font-size: 17px "><b>Contact via</b></div>
				               <input type="radio" name="contact" value="mobile" id="contact"  style="margin-top: 28px; margin-left: -375px;" checked>Mobile<br />
				               <input type="radio" name="contact" value="email" id="contact"  style="margin-top: 28px; margin-left: -375px;">Email
				            </div>	
				           
				            <div class="form-group col-md-12">
				                 <textarea name="msg" id="message" required="required" class="form-control" rows="8" placeholder="Your Message here" readonly>Dear.<?php echo $row['fname']." ".$row['lname'];?>, I want your book please provide me your contact details.</textarea>
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
    <?php 
         } }

            else{
            	if($row['status']==1){
                    echo "<script>alert('Sorry! Your request for this book is already accepted. You can not request this book again.')</script>";
                    echo "<script>location.assign('BooksView.php?bookid=$book_id')</script>"; 
            	}
         	  //echo "<br>Bool is 0";
               else{	
		            echo "<script>alert('Sorry! Your previous request is still in pending.')</script>";
                    echo "<script>location.assign('BooksView.php?bookid=$book_id')</script>";  
               }
         }  
    ?>
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
<?php } else { echo "<script>location.assign('login.php')</script>"; }?>